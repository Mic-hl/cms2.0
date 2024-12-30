<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

defineProps(['project']);

const projectsPage = sessionStorage.getItem('projectsPage');
</script>

<template>
    <Head title="Create project" />

    <AppLayout>
        <template #header>
            <h2>Add new project</h2>
            <NavLink
                v-if="$page.props.isGlobalAdmin"
                :href="route('projects.index', { page: projectsPage })"
                class="projects-link"
            >
                back to projects
            </NavLink>
        </template>

        <div class="content-wrapper">
            <div class="project">
                <h2>form</h2>
            </div>
        </div>
    </AppLayout>
</template>