import { ref } from 'vue';

export const theme = ref('light');

export const setTheme = (newTheme) => {
    theme.value = newTheme;
};
