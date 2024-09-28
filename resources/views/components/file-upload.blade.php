<div id="drop-area" class="col-12 align-content-center h-full py-2 py-lg-3">
    <div class="drop-icon">
        <i class="fa-solid fa-file-arrow-up fa-3x mb-1"></i>
    </div>
    <div class="drop-text text-sm leading-6 text-gray-600 mt-2">
        <label for="file-upload"
            class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
            <span>Upload .CEL file</span>
            <input id="file-upload" name="file-upload" type="file" class="sr-only">
        </label>
        <p class="pl-1">or drag here</p>
    </div>
</div>

<script>
    const dropArea = document.getElementById('drop-area');
    const droppedContent = document.getElementById('dropped-content');

    dropArea.addEventListener('dragenter', preventDefaults, false);
    dropArea.addEventListener('dragover', preventDefaults, false);
    dropArea.addEventListener('dragleave', handleDragLeave, false);
    dropArea.addEventListener('drop', handleDrop, false);

    dropArea.addEventListener('dragenter', highlight, false);
    dropArea.addEventListener('dragover', highlight, false);
    dropArea.addEventListener('dragleave', unhighlight, false);
    dropArea.addEventListener('drop', unhighlight, false);
    dropArea.addEventListener('click', openFileDialog, false);

    function preventDefaults(event) {
        event.preventDefault();
        event.stopPropagation();
    }

    function highlight() {
        dropArea.classList.add('highlight');
        dropArea.innerHTML = `
            <div class="drop-icon">
                <i class="fa-solid fa-file-arrow-up fa-4x mb-1"></i>
            </div>
            <div class="drop-text text-sm leading-6 text-gray-600 mt-2">
                <p class="pl-1">drop here</p>
            </div>
        `;
    }

    function unhighlight() {
        dropArea.classList.remove('highlight');
        dropArea.innerHTML = `
            <div class="drop-icon">
                <i class="fa-solid fa-file-arrow-up fa-4x mb-1"></i>
            </div>
            <div class="drop-text text-sm leading-6 text-gray-600 mt-2">
                <label for="file-upload" class="relative cursor-pointer rounded-md bg-white font-semibold text-indigo-600 focus-within:outline-none focus-within:ring-2 focus-within:ring-indigo-600 focus-within:ring-offset-2 hover:text-indigo-500">
                    <span>Upload .CEL file</span>
                    <input id="file-upload" name="file-upload" type="file" class="sr-only">
                </label>
                <p class="pl-1">or drag here</p>
            </div>
        `;
    }

    function handleDragLeave(event) {
        if (event.relatedTarget !== null) {
            return;
        }
        unhighlight();
    }

    function handleDrop(event) {
        event.preventDefault();
        const file = event.dataTransfer.files[0];
        const reader = new FileReader();

        reader.readAsText(file);
        reader.onload = function() {
            save()
        };

        unhighlight();
    }

    function openFileDialog(event) {
        const fileInput = document.createElement('input');
        fileInput.type = 'file';
        fileInput.accept = 'text/plain';

        fileInput.addEventListener('change', handleFileSelect, false);

        fileInput.click();
    }

    function handleFileSelect(event) {
        const file = event.target.files[0];
        const reader = new FileReader();

        reader.readAsText(file);
        reader.onload = function() {
            save()
        };
    }
</script>
