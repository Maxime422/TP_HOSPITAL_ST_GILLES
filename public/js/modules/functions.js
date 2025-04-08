"use strict";

function getData() {
  // Simulate an error
  const error = new Error("An error occurred while fetching data.");
  alertMessage(error.message);
}

/************** Export **************/
export { getData };
