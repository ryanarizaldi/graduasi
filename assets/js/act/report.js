const baseUrl = "http://localhost/graduasi/";
const tbody = document.getElementById("tbody");
const tbodyRekap = document.getElementById("tbodyRekap");
const tblNominatif = document.getElementById("tblNominatif");
const tblRekap = document.getElementById("tblRekap");
const inqReportGrad = document.getElementById("inqReportGrad");
const pAkhir = document.getElementById("pAkhir");
// const pAkhirVal = document.querySelector('pAkhir[type="month"]');
const pAwal = document.getElementById("pAwal");
const jnsLap = document.getElementById("jnsLap");
const bulans = [
  "",
  "January",
  "Februari",
  "Maret",
  "April",
  "Mei",
  "Juni",
  "July",
  "Agustus",
  "September",
  "Oktober",
  "November",
  "Desember",
];

const inqReport = async () => {
  //   tblNominatif.hidden = true;
  //   tblRekap.hidden = true;
  tbody.innerHTML = ``;
  tbodyRekap.innerHTML = ``;
  //   tblNominatif.addAttribute("hidden");
  //   console.log(pAkhirVal.value);
  //   console.log(pAkhir.value);
  //   console.log(pAwal.value);
  //   console.log(jnsLap.value);
  Swal.fire({
    allowOutsideClick: false,
    title: "Generating Report",
    html: "Please Wait...",
    padding: "3em",
    showConfirmButton: false,
  });
  await fetch(baseUrl + "actions/reportGraduasiAction.php", {
    method: "post",
    body: JSON.stringify({
      jnsLap: jnsLap.value,
      pAwal: pAwal.value,
      pAkhir: pAkhir.value,
    }),
  })
    .then((response) => {
      //   console.log(response);
      return response.text();
    })
    .then((json) => {
      //   console.log(JSON.parse(json).err);
      let data = JSON.parse(json);
      //   console.log(data);
      if (!data.err) {
        // let text = `Message: ${data.msg}. <br> Path: ${data.path}`;
        Swal.fire({
          title: "Generate Report Succeed",
          //   html: "<div>" + text + "</div>",
          //   customClass: {
          //     popup: "format-pre",
          //   },
          timer: 1500,
          icon: "success",
          showConfirmButton: false,
        });
        if (jnsLap.value == 1) {
          tblNominatif.hidden = false;
          tblRekap.hidden = true;
          for (let index = 0; index < data.data.length; index++) {
            tbody.innerHTML += `
                <tr>
                <td class="align-middle text-center">
                  ${index + 1}
                </td>
                <td class="align-middle text-center" ss:Type="String">
                  ${data.data[index].no_rekening}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].nama}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].nik}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].cif}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].tgl_akad}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].skema}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].skm_name}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].gradskema}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].rek_lama}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].tgl_akad_lama}
                </td>
                <td class="align-middle text-center">
                  ${data.data[index].skema_rek_lama}
                </td>
                
              </tr>
                `;
          }
        } else if (jnsLap.value == 2) {
          console.log(data);
          tblRekap.hidden = false;
          tblNominatif.hidden = true;
          for (let index = 0; index < data.data.length; index++) {
            let bln = bulans[data.data[index].bulan];

            tbodyRekap.innerHTML += `
            <tr>
                <td class="align-middle text-center">
                <span>${bln} ${data.data[index].tahun}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].SUPERMIKRO_MIKRO}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].SUPERMIKRO_KECIL}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].SUPERMIKRO_KOMERSIL}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].MIKRO_KECIL}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].MIKRO_KOMERSIL}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].KECIL_KOMERSIL}</span>
                </td>
                <td class="align-middle text-center">
                <span>${data.data[index].total}</span>
                </td>
            </tr>`;
          }
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

      //   tampilLoading.innerHTML = ``;
      //   cari.style.visibility = "visible";
      //   simpan();
    })
    .catch((error) => {
      console.log(error);
    });
};
