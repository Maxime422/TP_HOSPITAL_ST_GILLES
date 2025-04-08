const { defineConfig } = require("cypress");

module.exports = defineConfig({
  e2e: {
    specPattern: "cypress/e2e/**/*.cy.js", // Path to E2E test files
    supportFile: "cypress/support/e2e.js", // Path to the Cypress support file
    screenshotOnRunFailure: true,
    video: true,

    screenshotsFolder: "cypress/screenshots", // Folder for screenshots
    videosFolder: "cypress/videos", // Folder for videos
    setupNodeEvents(on, config) {
      // Log messages before and after tests
      on("before:run", () => {
        console.log("Tests are about to start!");
      });
      on("after:run", () => {
        console.log("Tests have finished!");
      });
    },
  },
});
