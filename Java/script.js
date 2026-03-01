const form = document.getElementById("reservationForm");
const table = document.getElementById("dataTable");

let reservations = JSON.parse(localStorage.getItem("reservations")) || [];
let editIndex = -1;

function renderTable() {
  table.innerHTML = "";

  reservations.forEach((res, index) => {
    table.innerHTML += `
      <tr style="background: ${index === 0 ? '#4cb3d2' : ''}; color: ${index === 0 ? '#0d1b2a' : ''}">
        <td>${res.nama}</td>
        <td>${res.band}</td>
        <td>${res.tanggal}</td>
        <td>${res.durasi} jam</td>
        <td>
          <button class="btn-warning" onclick="editData(${index})">Edit</button>
          <button class="btn-danger" onclick="deleteData(${index})">Hapus</button>
        </td>
      </tr>
    `;
  });
}

function saveToLocalStorage() {
  localStorage.setItem("reservations", JSON.stringify(reservations));
}

function formatTanggal(input) {
  let value = input.value.replace(/\D/g, '');
  if (value.length >= 3 && value.length <= 4) {
    value = value.slice(0, 2) + '/' + value.slice(2);
  } else if (value.length >= 5) {
    value = value.slice(0, 2) + '/' + value.slice(2, 4) + '/' + value.slice(4, 8);
  }
  input.value = value;
}

form.addEventListener("submit", function(e) {
  e.preventDefault();

  const nama = document.getElementById("nama").value.trim();
  const band = document.getElementById("band").value.trim();
  const tanggal = document.getElementById("tanggal").value;
  const durasi = document.getElementById("durasi").value;

  if (!nama || !band || !tanggal || !durasi) {
    alert("Semua field wajib diisi!");
    return;
  }

  if (!/^[a-zA-Z\s]+$/.test(nama)) {
    alert("Nama hanya boleh huruf!");
    return;
  }

  if (nama.length < 3) {
    alert("Nama minimal 3 karakter!");
    return;
  }

  if (durasi <= 0) {
    alert("Durasi harus lebih dari 0!");
    return;
  }

  if (!/^\d{2}\/\d{2}\/\d{4}$/.test(tanggal)) {
    alert("Format tanggal harus dd/mm/yyyy!");
    return;
  }

  const [dd, mm, yyyy] = tanggal.split('/');
  const tanggalSimpan = `${yyyy}-${mm}-${dd}`;

  const data = { nama, band, tanggal: tanggalSimpan, durasi};

  if (editIndex === -1) {
    reservations.unshift(data);
    alert("Reservasi berhasil disimpan!");
  } else {
    reservations[editIndex] = data;
    editIndex = -1;
    alert("Reservasi berhasil diperbarui!");
  }

  saveToLocalStorage();
  renderTable();
  form.reset();
});

window.editData = function(index) {
  const res = reservations[index];
  const [yyyy, mm, dd] = res.tanggal.split('-');

  document.getElementById("nama").value = res.nama;
  document.getElementById("band").value = res.band;
  document.getElementById("tanggal").value = `${dd}/${mm}/${yyyy}`;
  document.getElementById("durasi").value = res.durasi;

  editIndex = index;
};

window.deleteData = function(index) {
  if (confirm("Yakin ingin menghapus reservasi ini?")) {
    reservations.splice(index, 1);
    saveToLocalStorage();
    renderTable();
    alert("Reservasi dihapus!");
  }
};

renderTable();