const chercher = (e) => {
  const motCle = document.getElementById("motCle");
  e.preventDefault();
  window.location.replace(`/livre/filterByTitre/${motCle.value}`);
};
const list = (e) => {
  const dateMin = document.getElementById("dateMin");
  const dateMax = document.getElementById("dateMax");
  e.preventDefault();
  window.location.replace(
    `/livre/filterBetweenTwoDates/${dateMin.value}/${dateMax.value}`
  );
};
const livres = document.getElementById("livres");
const noteAlert = document.getElementById("note-range-alert");
if (livres) {
  livres.addEventListener("click", (e) => {
    const id = e.target.getAttribute("data-id");
    const livreNote = document.getElementById(`livre-note-${id}`);
    if (e.target.className === "btn btn-primary augmenter") {
      fetch(`/livre/augmenter/${id}`, {})
        .then((res) => res.json())
        .then((data) => {
          console.log(data);
          livreNote.innerHTML = data.note;
          if (!data.success) {
            noteAlert.style.display = "block";
            setTimeout(() => {
              noteAlert.style.display = "none";
            }, 3000);
          }
        });
    }
    if (e.target.className === "btn btn-primary diminuer") {
      fetch(`/livre/diminuer/${id}`, {})
        .then((res) => res.json())
        .then((data) => {
          livreNote.innerHTML = data.note;
          if (!data.success) {
            noteAlert.style.display = "block";
            setTimeout(() => {
              noteAlert.style.display = "none";
            }, 3000);
          }
        });
    }
  });
}
const filtrerParNote = (e) => {
  window.location.replace(`/livre/filterByNote/${e.target.value}`);
};
const filtrerParDate = (e) => {
  let date = new Date(e.target.value).toISOString().slice(0, 10);
  window.location.replace(`/livre/filterByDate/${date}`);
};
const filtrerParAuteur = (e) => {
  console.log(e.target.value);
  window.location.replace(`/livre/filterByAuteur/${e.target.value}`);
};
const filtrerParGenre = (e) => {
  console.log(e.target.value);
  window.location.replace(`/livre/filterByGenre/${e.target.value}`);
};
