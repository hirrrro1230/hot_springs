<template>
    <form @submit.prevent="saveChanges">
        <div class="field">
            <label for="name">名前</label>
            <input v-model="spring.name" type="text" name="name" required>
        </div>
        <div class="field">
            <label for="address">住所</label>
            <input v-model="spring.address" type="text" name="address" required>
        </div>
        <!-- Add other fields as needed -->
        <div class="field">
            <button type="submit" class="button is-primary">保存</button>
        </div>
    </form>
</template>

<script>
export default {
    props: {
        spring: Object,
    },
    methods: {
        saveChanges() {
            // Add logic to save changes
            this.$emit('close');
        },
    },
};
</script>