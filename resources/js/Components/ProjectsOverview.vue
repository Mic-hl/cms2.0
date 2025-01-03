<script setup>
import { Link } from '@inertiajs/vue3';
</script>

<template>
    <div class="projects-overview">
        <h3>total projects</h3>
        <span class="projects-number">12</span>
        <Link
            :href="route('projects.index', { page: projectsPage })"
            class="projects-link"
        >
            show projects
        </Link>
        <Link
            :href="route('projects.create')"
            class="project-create-link"
        >
            add new project
        </Link>
    </div>
</template>