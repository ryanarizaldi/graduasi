const baseUrl = "http://localhost/graduasi/";
const user = document.getElementById("username");
const pwd = document.getElementById("pwd");
const alertLogin = document.getElementById("alertLogin");
const errLogin = document.getElementById("errLogin");
const btnLogin = document.getElementById("btnLogin");
const login = async () => {
  btnLogin.innerHTML = ``;
  btnLogin.innerHTML = `<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
    Loading..`;

  console.log(user.value);
  console.log(pwd.value);
  if (user.value == `` && pwd.value == ``) {
    console.log("masuk sini");
    alertLogin.hidden = false;
    errLogin.innerHTML = `user / password tidak boleh kosong`;
    btnLogin.innerHTML = `SIGN IN`;
  } else {
    await fetch(baseUrl + "actions/loginAct.php", {
      method: "post",
      body: JSON.stringify({
        user: user.value,
        pwd: pwd.value,
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
          console.log(data);
          //   if (data.rCode != "00") {
          if (!data.stsLogin) {
            alertLogin.hidden = false;
            errLogin.innerHTML = `rCode = ${data.rCode} - message: ${data.message}`;
            btnLogin.innerHTML = `SIGN IN`;
          } else {
            // if (data.) {

            // }
            window.location.href = "http://localhost/graduasi/pages/tables.php";
            btnLogin.innerHTML = `SIGN IN`;
          }
        } else {
          // Swal.fire({
          //   title: "koneksi SSO Olibs Mengalami Gangguan",
          //   html: "<div>" + text + "</div>",
          //   customClass: {
          //     popup: "format-pre",
          //   },
          //   icon: "error",
          // });
        }
        //   tampilLoading.innerHTML = ``;
        //   cari.style.visibility = "visible";
        //   simpan();
      })
      .catch((error) => {
        console.log(error);
      });
  }
};

const logout = async () => {
  await fetch(baseUrl + "actions/loginAct.php", {
    method: "post",
    body: JSON.stringify({
      user: user.value,
      pwd: pwd.value,
    }),
  })
    .then((response) => {
      return response.text();
    })
    .then((json) => {
      let data = JSON.parse(json);
      if (!data.err) {
        console.log(data);
        if (!data.stsLogin) {
          alertLogin.hidden = false;
          errLogin.innerHTML = `rCode = ${data.rCode} - message: ${data.message}`;
          btnLogin.innerHTML = `SIGN IN`;
        } else {
          window.location.href = "http://localhost/graduasi/pages/tables.php";
          btnLogin.innerHTML = `SIGN IN`;
        }
      }
    })
    .catch((error) => {
      console.log(error);
    });
};
