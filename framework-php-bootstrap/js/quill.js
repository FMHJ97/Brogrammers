document.addEventListener("DOMContentLoaded", function () {
    const quill = new Quill('#eq-editor', {
        modules: {
            toolbar: [
                ['bold', 'italic', 'underline'],
                [{ list: 'ordered' }, { list: 'bullet' }]
            ]
        },
        theme: 'snow',
        placeholder: 'Escriba aquí su valoración...',
    });


});