import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
		'./vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
		 './vendor/laravel/jetstream/**/*.blade.php',
		 './storage/framework/views/*.php',
		 './resources/views/components/**/*.blade.php',
		 './resources/views/**/*.blade.php',
		 "./vendor/robsontenorio/mary/src/View/Components/**/*.php"
	],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
        },
    },

    plugins: [
		require("daisyui"),
		forms,
		typography,
	],

	daisyui: {
		themes: ["light", "dark", "cupcake"],
		darkTheme: "light",
		base: true,
		styled: true,
		utils: true,
	},
	
};
