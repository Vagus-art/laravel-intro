let updateNoteFormData = {
    title: "",
    content: "",
    id: 0,
};

const modalFormTitleInput = document.getElementById("modalFormTitleInput");
const modalFormContentInput = document.getElementById("modalFormContentInput");

function setForm(note) {
    updateNoteFormData = {
        title: note.title,
        content: note.content,
        id: note.id,
    };
    modalFormTitleInput.value = updateNoteFormData.title;
    modalFormContentInput.value = updateNoteFormData.content;
}

function onChangeTitle(e) {
    updateNoteFormData.title = e.target.value;
}

function onChangeContent(e) {
    updateNoteFormData.content = e.target.value;
}

modalFormTitleInput.addEventListener("keyup", onChangeTitle);
modalFormContentInput.addEventListener("keyup", onChangeContent);

function saveNote() {
    axios({
        method: "put",
        url: "/",
        data: updateNoteFormData,
    })
        .then(() => window.location.reload())
        .catch((err) => console.log(err));
}
