<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

defineProps(['project']);

const projectsPage = sessionStorage.getItem('projectsPage');
</script>

<template>
    <Head title="Project" />

    <AppLayout>
        <template #header>
            <h2>{{ project.name }}</h2>
            <Link
                :href="route('projects.index', { page: projectsPage })"
                class="projects-link"
            >
                back to projects
            </Link>
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
                <div class="project-settings">
                    <button class="button-secondary">edit</button>
                    <button class="button-danger">delete</button>
                </div>
            </div>
        </div>
    </AppLayout>
</template>