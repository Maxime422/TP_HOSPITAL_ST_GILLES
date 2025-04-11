"use strict";

// Check if a theme exists in localStorage, if not, set the default theme to dark
if (localStorage.getItem("theme")) {
  const theme = localStorage.getItem("theme");
  toggleTheme(theme);
} else {
  localStorage.setItem("theme", "dark");
  toggleTheme("dark");
}

/************** Dark Mode / Light Mode **************/
document.querySelector("#darkLightMode").addEventListener("click", () => {
  // Toggle the theme between dark and light
  const currentTheme = localStorage.getItem("theme");
  const newTheme = currentTheme === "dark" ? "light" : "dark";
  toggleTheme(newTheme);
});

function toggleTheme(theme) {
  // Get the link element for the theme
  const mode = document.querySelector("#mode");

  // Define the fixed paths for light and dark mode CSS
  const lightModePath = "./public/css/light-mode.css";
  const darkModePath = "./public/css/dark-mode.css";

  // Apply the correct theme based on the parameter
  if (theme === "dark") {
    mode.setAttribute("href", darkModePath);
    localStorage.setItem("theme", "dark");
  } else if (theme === "light") {
    mode.setAttribute("href", lightModePath);
    localStorage.setItem("theme", "light");
  } else {
    console.error("Unexpected error while toggling theme");
  }
}
