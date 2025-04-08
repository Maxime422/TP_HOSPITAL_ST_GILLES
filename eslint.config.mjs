import {defineConfig} from 'eslint/config';
import globals from 'globals';
import js from '@eslint/js';
import prettierPlugin from 'eslint-plugin-prettier';
import prettierConfig from 'eslint-config-prettier';

export default defineConfig([
	{
		files: ['**/*.{js,mjs,cjs}'], // Targets all JS-based files
	},
  {
    // Ignore specific folders and files that should not be linted
    ignores: ['node_modules/', 'dist/', 'vendor/', '*.min.js', 'eslint.config.*', 'service-worker.js', 'cypress.config.js', 'cypress/support/index.js', 'coverage/', 'build/'],
  },
	{
		files: ['**/*.{js,mjs,cjs}'],
		languageOptions: {
			globals: globals.browser,
		},
    rules: {
      'semi': ['error', 'always'], // Enforce semicolons at the end of statements
      'quotes': ['error', 'double', { avoidEscape: true, allowTemplateLiterals: true }], // Enforce double quotes

      'no-unused-vars': ['warn', { args: 'none', ignoreRestSiblings: true }], // Disallow unused variables

      'eqeqeq': ['warn'], // Prefer strict equality (=== and !==)

      'no-var': 'error', // Disallow the use of var

      'prefer-const': 'warn', // Suggest using const for variables that are not reassigned

      'indent': ['warn', 2, { SwitchCase: 1 }], // Enforce 2-space indentation

      'no-debugger': 'warn', // Warn when using debugger

      'curly': 'error', // Require curly braces for all control statements

      'arrow-spacing': ['warn', { before: true, after: true }], // Enforce spaces around arrow functions for better readability

      'object-curly-spacing': ['warn', 'always'], // Enforce spaces inside object curly braces for better readability

      'complexity': ['warn', { max: 10 }], // Warn when functions exceed a complexity of 10
    },
	},
]);
