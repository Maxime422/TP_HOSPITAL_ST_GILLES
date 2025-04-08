module.exports = {
  verbose: true, // Display detailed information about each test
  collectCoverage: true, // Enable code coverage collection
  coverageDirectory: "coverage", // Directory where coverage reports will be stored
  testMatch: [
    "**/tests/unit/**/*.test.js", // Unit test files
    "**/tests/integration/**/*.test.js", // Integration test files
  ],
  moduleFileExtensions: ["js", "json"], // File extensions Jest will process
  coverageReporters: ["json", "lcov", "text"], // Formats for coverage reports
};
