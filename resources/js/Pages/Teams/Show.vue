<script setup>
import UserLayout from '@/Layouts/UserLayout.vue';
import DeleteTeamForm from '@/Pages/Teams/Partials/DeleteTeamForm.vue';
import SectionBorder from '@/Components/SectionBorder.vue';
import TeamMemberManager from '@/Pages/Teams/Partials/TeamMemberManager.vue';
import UpdateTeamNameForm from '@/Pages/Teams/Partials/UpdateTeamNameForm.vue';
import TeamSocialsForm from './Partials/TeamSocialsForm.vue';

defineProps({
    team: Object,
    availableRoles: Array,
    permissions: Object,
});
</script>

<template>
    <UserLayout title="Company Settings">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Company Settings
            </h2>
        </template>

        <div>
            <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
                <UpdateTeamNameForm :team="team" :permissions="permissions" />
                <TeamSocialsForm :team="team" :permissions="permissions" class="mt-5" />

                <TeamMemberManager
                    class="mt-10 sm:mt-0"
                    :team="team"
                    :available-roles="availableRoles"
                    :user-permissions="permissions"
                />

                <template v-if="permissions.canDeleteTeam && ! team.personal_team">
                    <SectionBorder />

                    <DeleteTeamForm class="mt-10 sm:mt-0" :team="team" />
                </template>
            </div>
        </div>
    </UserLayout>
</template>
