const baseUrl = "http://localhost/graduasi/";
const pAkhir = document.getElementById("pAkhir");
const pAwal = document.getElementById("pAwal");
const tblLogs = document.getElementById("tblLogs");
const tbody = document.getElementById("tbody");

// document.getElementById("pAkhir").value = new Date().toDateInputValue();
console.log(baseUrl + "actions/logsAction.php");

const inqLogs = async () => {
  tblLogs.hidden = true;
  tbody.innerHTML = ``;

  if (pAwal.value != "" || pAkhir.value != "") {
    Swal.fire({
      allowOutsideClick: false,
      title: "Generating Report",
      html: "Please Wait...",
      padding: "3em",
      showConfirmButton: false,
    });

    await fetch(baseUrl + "actions/logsAction.php", {
      method: "post",
      body: JSON.stringify({
        pAwal: pAwal.value,
        pAkhir: pAkhir.value,
      }),
    })
      .then((response) => {
        return response.text();
      })
      .then((json) => {
        let data = JSON.parse(json);
        console.log("data:, ", data);
        if (!data.err) {
          if (data.data.length > 1) {
            Swal.fire({
              title: "Generate Report Succeed",
              timer: 1500,
              icon: "success",
              showConfirmButton: false,
            });
            tblLogs.hidden = false;
            for (let index = 0; index < data.data.length; index++) {
              // for (let index = 0; index < Object.keys(data).length; index++) {
              tbody.innerHTML += `
                                <tr>
                                <td class="align-middle text-center">
                                  ${index + 1}
                                </td>
                                <td class="align-middle text-center" ss:Type="String">
                                  ${data.data[index].time_stamp}
                                </td>
                                <td class="align-middle text-center">
                                  ${data.data[index].ket}
                                </td>
                              </tr>
                                `;
            }
          } else {
            Swal.fire({
              title: "Data tidak Ditemukan",
              html: `tidak ada log dalam kurun waktu ${pAwal.value} - ${pAkhir.value} `,
              customClass: {
                popup: "format-pre",
              },
              icon: "error",
            });
          }
        } else {
          Swal.fire({
            title: "Database Backup Error",
            html: "<div>" + text + "</div>",
            customClass: {
              popup: "format-pre",
            },
            icon: "error",
          });
        }
      });
  } else {
    Swal.fire({
      title: "Tanggal Akhir / Tanggal Awal tidak boleh kosong",
      // timer: 1500,
      icon: "error",
      // showConfirmButton: false,
    });
  }
};
