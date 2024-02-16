// const exportNomi = document.getElementById("exportNomi");

// const exportNomiAct = (tblId) => {
//   exportTableToExcel(tblId);
// };

function exportTableToExcel(tableId) {
  // Get the table element using the provided ID
  const table = document.getElementById(tableId);

  // Extract the HTML content of the table
  const html = table.outerHTML;

  // Create a Blob containing the HTML data with Excel MIME type
  //   const blob = new Blob([html], { type: "application/vnd.ms-excel" });
  const blob = new Blob([html], { type: "text/csv" });

  // Create a URL for the Blob
  const url = URL.createObjectURL(blob);

  // Create a temporary anchor element for downloading
  const a = document.createElement("a");
  a.href = url;

  // Set the desired filename for the downloaded file
  a.download = "table.csv";

  // Simulate a click on the anchor to trigger download
  a.click();

  // Release the URL object to free up resources
  URL.revokeObjectURL(url);
}

// Attach the function to the export button's click event
document.getElementById("exportButton").addEventListener("click", function () {
  exportTableToExcel("tableId");
});
