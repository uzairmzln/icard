import { ref } from 'vue';
import { useRouter } from 'vue-router';
import axios from 'axios';

export function useAuth(){

    const name = ref('');
    const email = ref('');
    const password = ref('');
    // const confirmPassword = ref('');
    const errors = ref(null);
    const router = useRouter();

    const registerUser = async () => {
        // Optional: basic password match validation
        // if (password.value !== confirmPassword.value) {
        //     errors.value = "Passwords do not match.";
        //     return;
        // }  
        
        try {
            const response = await axios.post('/register', {
                name: name.value,
                email: email.value,
                password: password.value,
                // password_confirmation: confirmPassword.value
            });

            localStorage.setItem('auth_token', response.data.token);

            axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;

            router.push('/dashboard');

        } catch (error) {
            errors.value = error.response?.data?.message || 'Register failed';
        }
    }

    const loginUser = async () => {
        try {
            const response = await axios.post('/login', {
                email: email.value,
                password: password.value,
            });

            // Save token to localStorage
            localStorage.setItem('auth_token', response.data.token);

            // Add token to default headers (optional, but recommended)
            axios.defaults.headers.common['Authorization'] = `Bearer ${response.data.token}`;

            // Push to dashboard
            router.push('/dashboard');

        } catch (error) {
            errors.value = error.response?.data?.message || 'Login failed';
        }
    };

    const logoutUser = async () => {
        
        try {
            await axios.post('/logout');
            
        } catch (error) {
            if (error.response?.status === 401) {
                console.warn('Token expired or invalid, clearing anyway.');
            } else {
                console.error('Logout error:', error);
            }

        } finally {
            localStorage.removeItem('auth_token');
            delete axios.defaults.headers.common['Authorization'];
            router.push('/');

        }
    }

    return {
        name,
        email,
        password,
        // confirmPassword,
        errors,
        registerUser,
        loginUser,
        logoutUser
    };
}