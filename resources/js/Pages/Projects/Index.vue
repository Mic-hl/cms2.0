<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Project from '@/Components/Project.vue';
import NavLink from '@/Components/NavLink.vue';
import { Head, Link } from '@inertiajs/vue3';
import { ref } from 'vue';

const props = defineProps(['projects']);
const currentPage = ref(props.projects?.current_page || 1);

const saveCurrentPage = () => {
    sessionStorage.setItem('projectsPage', currentPage.value);
};
</script>

<template>
    <Head title="Projects" />

    <AppLayout title="Projects">
        <template #header>
            <h2>Projects</h2>
            <NavLink
                v-if="$page.props.isGlobalAdmin"
                :href="route('projects.create')"
                class="projects-link"
                @click="saveCurrentPage"
            >
                add project
            </NavLink>
        </template>

        <div class="content-wrapper">
            <ul class="projects-list">
                <li v-for="project in projects.data" :key="project.id">
                    <Link
                        :href="`projects/${project.id}`"
                        class="project-link"
                        @click="saveCurrentPage"
                    >
                        <Project
                            :name="project.name"
                            :slug="project.slug"
                            :description="project.description"
                            :url="project.url"
                        />
                    </Link>
                </li>
            </ul>
        </div>
        <div v-if="projects.links" class="pagination">
            <Link
                v-for="(link, index) in projects.links"
                :key="index"
                :href="link.url || '#'"
                v-html="link.label"
                :class="{ 'pagination-link': true, 'active': link.active }"
                :aria-disabled="!link.url"
            ></Link>
        </div>
    </AppLayout>
</template>
