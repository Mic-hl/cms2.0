<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import Welcome from '@/Components/Welcome.vue';
import ProjectsOverview from '@/Components/ProjectsOverview.vue';
</script>

<template>
    <AppLayout title="Dashboard">
        <template #header>
            <h2>Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="dashboard-wrapper overflow-hidden">
                    <ProjectsOverview
                        v-if="$page.props.profile.user.isGlobalAdmin"
                    />
                </div>
            </div>
        </div>
    </AppLayout>
</template>
