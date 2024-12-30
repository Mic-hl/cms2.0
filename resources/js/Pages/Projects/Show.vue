<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head } from '@inertiajs/vue3';
import NavLink from '@/Components/NavLink.vue';

defineProps(['project']);

const previousPage = sessionStorage.getItem('projectsPage');
</script>

<template>
    <Head title="Project" />

    <AppLayout>
        <template #header>
            <h2>{{ project.name }}</h2>
            <NavLink
                v-if="$page.props.isGlobalAdmin"
                :href="route('projects.index', { page: previousPage })"
                class="projects-link"
            >
                back to projects
            </NavLink>
        </template>

        <div class="content-wrapper">
            <div class="project">
                <div class="project-info">
                    <h2 class="project-name">
                        {{ project.name }}
                    </h2>
                    <small class="project-slug">
                        {{ project.slug }}
                    </small>
                    <a v-if="project.url" href="#" target="_blank" class="project-url">
                        {{ project.url }}
                    </a>
                </div>
                <div v-if="project.description" class="project-description">
                    {{ project.description }}
                </div>
            </div>
        </div>
    </AppLayout>
</template>