<script setup>
import { ref } from 'vue';

const selectedStatus = ref(null);
const statuses = ref([
    { name: 'Unemployed', value: 'unemployed' },
    { name: 'Employed', value: 'employed' },
    { name: 'Student', value: 'student' },
    { name: 'Others', value: 'others' }
]);

const companyName = ref('');
const schoolName = ref('');

const onAdvancedUpload = () => {
    toast.add({ severity: 'info', summary: 'Success', detail: 'File Uploaded', life: 3000 });
};
</script>

<template>
    <div class="card grid md:grid-cols-2 w-full">
        <Toast />

        <Fieldset legend="Create" pt:content:class="flex">
            <Form>
                <div class="flex flex-col gap-6 p-4">
                    <FloatLabel variant="on">
                        <InputText id="name_on_card" v-model="value" autocomplete="off" class="w-full md:w-100" />
                        <label for="name_on_card">On Card Name</label>
                    </FloatLabel>
                    
                    <FloatLabel variant="on">
                        <InputText id="email_on_card" v-model="value" autocomplete="off" class="w-full md:w-100" />
                        <label for="email_on_card">On Card Email</label>
                    </FloatLabel>
                    
                    <FloatLabel variant="on">
                        <InputText id="contact_number" v-model="value" autocomplete="off" placeholder="0111111111" class="w-full md:w-100" />
                        <label for="contact_number">Contact Number</label>
                    </FloatLabel>

                    <FloatLabel>
                        <Select
                            id="select_status"
                            v-model="selectedStatus"
                            :options="statuses"
                            optionLabel="name"
                            optionValue="value"
                            checkmark
                            :highlightOnSelect="false"
                            class="w-full md:w-100"
                        />
                        <label for="select_status">Select Status</label>
                    </FloatLabel>
                        <!-- Conditional input for employed -->
                        <InputText
                            v-if="selectedStatus === 'employed'"
                            v-model="companyName"
                            class="w-full"
                            placeholder="Enter company name"
                        />

                        <!-- Conditional input for student -->
                        <InputText
                            v-if="selectedStatus === 'student'"
                            v-model="schoolName"
                            class="w-full"
                            placeholder="Enter college/university"
                        />
                    <Fieldset legend="Address" class="w-full md:w-50">
                        <FloatLabel variant="on" class="mb-4">
                            <IconField>
                                <InputIcon class="pi pi-map-marker" />
                                <InputText id="state" v-model="value3" autocomplete="off" class="w-full md:w-100" />
                            </IconField>
                            <label for="state">State</label>
                        </FloatLabel>
                        <FloatLabel variant="on">
                            <IconField>
                                <InputIcon class="pi pi-map" />
                                <InputText id="city" v-model="value3" autocomplete="off" class="w-full md:w-100" />
                            </IconField>
                            <label for="city">City</label>
                        </FloatLabel>
                    </Fieldset>
                    
                    <label for="pfp">Profile Images</label>
                    <FileUpload name="demo[]" url="/api/upload" @upload="onAdvancedUpload($event)" :multiple="true" accept="image/*" :maxFileSize="1000000" class="w-full md:w-100">
                        <template #empty>
                            <span>Drag and drop files to here to upload.</span>
                        </template>
                    </FileUpload>
                    <Button type="submit" severity="primary" label="Submit" class="w-full md:w-50"/>
                </div>
            </Form>
        </Fieldset >
    </div>
</template>