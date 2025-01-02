<script setup>
import { useForm } from '@inertiajs/vue3';
import FormSection from '@/Components/FormSection.vue';
import InputLabel from '@/Components/InputLabel.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';
import { setTheme } from '@/eventbus';

const props = defineProps({
    user: Object,
});

const form = useForm({
    theme: props.user.theme || 'light',
});

const availableThemes = [
    { label: 'light', value: 'light' },
    { label: 'dark', value: 'dark' },
];

const updateTheme = () => {
    form.post(route('user.update-theme'), {
        errorBag: 'updateTheme',
        preserveScroll: true,
        onSuccess: () => {
            setTheme(form.theme);
        },
    });
};
</script>

<template>
    <FormSection @submitted="updateTheme">
        <template #title>
            Theme
        </template>

        <template #description>
            Update your account's theme preference.
        </template>

        <template #form>
            <div class="col-span-6 sm:col-span-4">
                <InputLabel for="theme" value="Choose your theme" />
                
                <select
                    id="theme"
                    v-model="form.theme"
                    class="mt-1 block w-full rounded-md shadow-sm"
                >
                    <option
                        v-for="theme in availableThemes"
                        :key="theme.value"
                        :value="theme.value"
                    >
                        {{ theme.label }}
                    </option>
                </select>

                <InputError :message="form.errors.theme" class="mt-2" />
            </div>
        </template>

        <template #actions>
            <PrimaryButton :class="{'opacity-25': form.processing}" :disabled="form.processing">
                save
            </PrimaryButton>
        </template>
    </FormSection>
</template>
