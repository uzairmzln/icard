<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\cards;

class CardController extends Controller
{
    public function add(Request $request) {
        try {
            $validated = $request->validate([
                'name_on_card' => 'required|string|max:255|min:2',
                'email_on_card' => 'required|email|max:255',
                'phone_on_card' => 'required|string|max:20|min:10',
                'status' => 'required|string',
                'st_name' => 'nullable|string|max:255',
                'state' => 'required|string|max:255|min:2',
                'city' => 'required|string|max:255|min:2',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'background_color' => 'nullable|string',
                'card_design_id' => 'required|integer|exists:card_designs,id',
            ], [
                'name_on_card.required' => 'Name on card is required.',
                'name_on_card.min' => 'Name on card must be at least 2 characters.',
                'name_on_card.max' => 'Name on card cannot exceed 255 characters.',
                'email_on_card.required' => 'Email on card is required.',
                'email_on_card.email' => 'Please provide a valid email address.',
                'phone_on_card.required' => 'Phone number on card is required.',
                'phone_on_card.min' => 'Phone number must be at least 10 characters.',
                'phone_on_card.max' => 'Phone number cannot exceed 20 characters.',
                'status.required' => 'Status is required.',
                'status.in' => 'Status must be one of: active, inactive, pending.',
                'state.required' => 'State is required.',
                'state.min' => 'State must be at least 2 characters.',
                'city.required' => 'City is required.',
                'city.min' => 'City must be at least 2 characters.',
                'profile_image.image' => 'Profile image must be a valid image file.',
                'profile_image.mimes' => 'Profile image must be a jpeg, png, jpg, or gif file.',
                'profile_image.max' => 'Profile image size cannot exceed 2MB.',
                'background_color.regex' => 'Background color must be a valid hex color code (e.g., #FF0000).',
                'card_design_id.required' => 'Card design is required.',
                'card_design_id.integer' => 'Card design ID must be a valid number.',
                'card_design_id.exists' => 'Selected card design does not exist.',
            ]);

            // Handle file upload 
            $profileImagePath = null;
            if ($request->hasFile('profile_image')) {
                try {
                    $profileImagePath = $request->file('profile_image')->store('profile_images', 'public');
                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to upload profile image. Please try again.',
                        'error' => $e->getMessage(),
                    ], 500);
                }
            }

            $card = cards::create([
                'user_id' => auth()->id(),
                'name_on_card' => $validated['name_on_card'],
                'email_on_card' => $validated['email_on_card'],
                'phone_on_card' => $validated['phone_on_card'],
                'status' => $validated['status'],
                'st_name' => $validated['st_name'],
                'state' => $validated['state'],
                'city' => $validated['city'],
                'profile_image' => $profileImagePath,
                'background_color' => $validated['background_color'],
                'card_design_id' => $validated['card_design_id'],
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Card created successfully',
                'card' => $card,
            ], 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Handle any other errors
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while creating the card',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function update(Request $request, $id) {
        try {
            // Find the card
            $card = cards::find($id);
            if (!$card) {
                return response()->json([
                    'success' => false,
                    'message' => 'Card not found.',
                ], 404);
            }

            // Check user owns the card
            if ($card->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are not authorized to update this card.',
                ], 403);
            }

            $validated = $request->validate([
                'name_on_card' => 'sometimes|required|string|max:255|min:2',
                'email_on_card' => 'sometimes|required|email|max:255',
                'phone_on_card' => 'sometimes|required|string|max:20|min:10',
                'status' => 'sometimes|required|string|in:active,inactive,pending',
                'st_name' => 'nullable|string|max:255',
                'state' => 'sometimes|required|string|max:255|min:2',
                'city' => 'sometimes|required|string|max:255|min:2',
                'profile_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'background_color' => 'nullable|string|regex:/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/',
                'card_design_id' => 'sometimes|required|integer|exists:card_designs,id',
            ],[
                'name_on_card.required' => 'Name on card is required.',
                'name_on_card.min' => 'Name on card must be at least 2 characters.',
                'name_on_card.max' => 'Name on card cannot exceed 255 characters.',
                'email_on_card.required' => 'Email on card is required.',
                'email_on_card.email' => 'Please provide a valid email address.',
                'phone_on_card.required' => 'Phone number on card is required.',
                'phone_on_card.min' => 'Phone number must be at least 10 characters.',
                'phone_on_card.max' => 'Phone number cannot exceed 20 characters.',
                'status.required' => 'Status is required.',
                'status.in' => 'Status must be one of: active, inactive, pending.',
                'state.required' => 'State is required.',
                'state.min' => 'State must be at least 2 characters.',
                'city.required' => 'City is required.',
                'city.min' => 'City must be at least 2 characters.',
                'profile_image.image' => 'Profile image must be a valid image file.',
                'profile_image.mimes' => 'Profile image must be a jpeg, png, jpg, or gif file.',
                'profile_image.max' => 'Profile image size cannot exceed 2MB.',
                'background_color.regex' => 'Background color must be a valid hex color code (e.g., #FF0000).',
                'card_design_id.required' => 'Card design is required.',
                'card_design_id.integer' => 'Card design ID must be a valid number.',
                'card_design_id.exists' => 'Selected card design does not exist.',
            ]);

            // Handle file upload
            if ($request->hasFile('profile_image')) {
                try {
                    if ($card->profile_image && \Storage::disk('public')->exists($card->profile_image)) {
                        \Storage::disk('public')->delete($card->profile_image);
                    }
                    
                    $validated['profile_image'] = $request->file('profile_image')->store('profile_images', 'public');

                } catch (\Exception $e) {
                    return response()->json([
                        'success' => false,
                        'message' => 'Failed to upload profile image. Please try again.',
                        'error' => $e->getMessage(),
                    ], 500);
                }
            }

            $card->update($validated);

            $card->refresh();

            return response()->json([
                'success' => true,
                'message' => 'Card updated successfully',
                'card' => $card,
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Handle any other errors
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while updating the card',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    public function delete($id) {
        try {
            $card = cards::find($id);
            if (!$card) {
                return response()->json([
                    'success' => false,
                    'message' => 'Card not found.',
                ], 404);
            }

            if ($card->user_id !== auth()->id()) {
                return response()->json([
                    'success' => false,
                    'message' => 'You are not authorized to update this card.',
                ], 403);
            }

            // Store card data for response before deletion
            $cardData = $card->toArray();

            if ($card->profile_image && \Storage::disk('public')->exists($card->profile_image)) {
                try {
                    \Storage::disk('public')->delete($card->profile_image);
                } catch (\Exception $e) {
                    // Log the error but don't fail the deletion
                    \Log::warning('Failed to delete profile image: ' . $e->getMessage());
                }
            }

            $card->delete();

            return response()->json([
                'success' => true,
                'message' => 'Card deleted successfully',
                'deleted_card' => $cardData,
            ], 200);

        } catch (\Illuminate\Validation\ValidationException $e) {
            // Handle validation errors
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            // Handle any other errors
            return response()->json([
                'success' => false,
                'message' => 'An error occurred while deleting the card',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
