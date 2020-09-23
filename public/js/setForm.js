var updateNoteFormData = {
    title: "",
    content: "",
    id: 0,
};
var modalFormTitleInput = document.getElementById("modalFormTitleInput");
var modalFormContentInput = document.getElementById("modalFormContentInput");

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
        .then(function () {
            return window.location.reload();
        })
        ["catch"](function (err) {
            return console.log(err);
        });
}
