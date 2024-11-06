@extends('layouts.admin.parent')

@section('content')
    <div class="pagetitle">

        <h1>Question of "{{ $lesson->title }}" Lesson - Create</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.index') }}">Levels</a></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.level.lesson.index', $level->id) }}">Lessons</a></li>
                <li class="breadcrumb-item"><a
                        href="{{ route('admin.level.lesson.question.index', [$level->id, $lesson->id]) }}">Questions</a>
                </li>
                <li class="breadcrumb-item active">Create</li>
            </ol>
        </nav>
    </div>

    <section class="section">
        <form action="{{ route('admin.level.lesson.question.store', [$level->id, $lesson->id]) }}" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('POST')

            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Form Create Question</h5>

                    <div class="row mb-3">
                        <label for="question" class="col-sm-2 col-form-label">Question</label>
                        <div class="col-sm-10">
                            <input type="text" id="question" class="form-control" name="question" required>
                        </div>
                    </div>

                    <h5 class="card-title mt-3">Form Create Answers</h5>
                    {{-- Answer --}}

                    <div id="formContainer">
                        {{-- AKAN TERISI BRO --}}
                    </div>

                    {{-- Tombol Tambah --}}
                    <div class="d-flex justify-content-center">
                        <button type="button" id="addAnswer" class="btn btn-primary">Add Answer</button>
                    </div>

                    <div class="d-flex justify-content-between mt-5">
                        <a href="{{ route('admin.level.lesson.question.index', [$level->id, $lesson->id]) }}"
                            class="btn btn-secondary">Cancel</a>

                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>

                </div>
            </div>
        </form>
    </section>

    <script>
        document.getElementById('addAnswer').addEventListener('click', function() {
            const formContainer = document.getElementById('formContainer');
            const currentForms = formContainer.querySelectorAll('.answer-item'); // Hitung jumlah form yang ada saat ini
            const formCount = currentForms.length + 1; // Nomor untuk form baru dimulai dari 1 lagi
    
            // Membuat elemen form baru dengan status dan answer
            const newForm = `
                <div class="answer-item mb-4">
                    <div class="row mb-3">
                        <label for="answer${formCount}" class="col-sm-2 col-form-label">Answer ${formCount}</label>
                        <div class="col-sm-10">
                            <input type="text" id="answer${formCount}" class="form-control" name="answer[]" required>
                        </div>
                    </div>
    
                    <fieldset class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Status ${formCount}</legend>
                        <div class="col-sm-10">
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status[${formCount}]" id="WRONG${formCount}" value="WRONG" checked>
                                <label class="form-check-label" for="WRONG${formCount}">
                                    WRONG Answer
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status[${formCount}]" id="CORRECT${formCount}" value="CORRECT">
                                <label class="form-check-label" for="CORRECT${formCount}">
                                    CORRECT Answer
                                </label>
                            </div>
                        </div>
                    </fieldset>
                    
                    <button type="button" class="btn btn-danger remove-answer">Hapus</button>
                </div>
            `;
    
            formContainer.insertAdjacentHTML('beforeend', newForm); // Menambah form ke container
    
            // Menambahkan event listener ke tombol "Hapus" baru
            updateRemoveButtons();
        });
    
        // Fungsi untuk menghapus form
        function updateRemoveButtons() {
            const removeButtons = document.querySelectorAll('.remove-answer');
            removeButtons.forEach(function(button) {
                button.addEventListener('click', function() {
                    button.parentElement.remove(); // Menghapus form terkait
                    resetFormLabels(); // Reset nomor form setelah penghapusan
                });
            });
        }
    
        // Fungsi untuk reset nomor urut setiap kali ada perubahan pada form
        function resetFormLabels() {
            const formContainer = document.getElementById('formContainer');
            const forms = formContainer.querySelectorAll('.answer-item');
    
            forms.forEach((form, index) => {
                const formNumber = index + 1;
                
                // Update label dan ID untuk setiap form
                const answerLabel = form.querySelector('label[for^="answer"]');
                answerLabel.textContent = `Answer ${formNumber}`;
                
                const answerInput = form.querySelector('input[id^="answer"]');
                answerInput.id = `answer${formNumber}`;
    
                const statusLegend = form.querySelector('legend');
                statusLegend.textContent = `Status ${formNumber}`;
    
                const wrongRadio = form.querySelector('input[id^="WRONG"]');
                wrongRadio.id = `WRONG${formNumber}`;
                wrongRadio.name = `status${formNumber}`;
    
                const correctRadio = form.querySelector('input[id^="CORRECT"]');
                correctRadio.id = `CORRECT${formNumber}`;
                correctRadio.name = `status${formNumber}`;
            });
        }
    </script>
@endsection
