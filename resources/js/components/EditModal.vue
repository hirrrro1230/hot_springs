<template>
    <div class="modal" :class="{ 'is-active': showModal }">
        <div class="modal-background" @click="closeModal"></div>
        <div class="modal-content">
            <!-- Edit form goes here -->
            <form @submit.prevent="saveChanges">
                <!-- Edit form fields go here -->
                <button type="submit" class="button is-primary">保存</button>
            </form>
        </div>
        <button class="modal-close is-large" @click="closeModal" aria-label="close"></button>
    </div>
</template>

<script>
import EditForm from './EditForm.vue';

export default {
    data() {
        return {
            showModal: false,
            spring: null,
        };
    },
    methods: {
        openModal(spring) {
            this.spring = spring;
            this.showModal = true;
        },
        closeModal() {
            this.spring = null;
            this.showModal = false;
        },
    },
    components: {
        EditForm,
    },
};
</script>