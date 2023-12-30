<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Gestion Des Notes') }}
            {{$a_year}} 
        </h2>
        @include ('partials.div')
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 pt-6 text-gray-900">
                @include ('partials.noteNav')

                    <!-- <form action="">
                        <input oninput="validateInput()" id="number-input" type="number">
                    </form> -->

                </div>
                @livewire('student-marks', ['a_year' => $a_year])
                
            </div>
        </div>
    </div>
    <script>
                function autoSubmitSelect() {

                    

                    // window.onload = function() {
                    //     var input = document.getElementById("select_input");
                    //     window.addEventListener("onload", function() {
                    //         // Focus the input element
                    //         input.focus();
                    //         // Select the text inside the input element
                    //         input.select();
                    //     });
                    //     const selectForm = document.getElementById('select_form"');
                    //     selectForm.submit();

                    // };
                    // var select_input = document.getElementById("select_input");
                    // const selectForm = document.getElementById('select_form"');
                    // select_input.addEventListener('change', function() {
                    //     selectForm.submit();
                    // });
                }
            </script>

    <script>
        function validate(str, min, max) {
            // convert the input string to a number
            var n = parseFloat(str);
            // check if the number is valid and within the range
            if (!isNaN(n) && n >= min && n <= max) {
                // return the number as valid
                return n;
            } else {
                // return null as invalid
                return null;
            }
        }

        function validateInput() {
            // get the input element by its id
            var input = document.getElementById("number-input");
            // get the input value
            var value = input.value;
            // validate the input value using the validate function
            var valid = validate(value, 0, 20);
            // if the input value is valid, set it as the input value
            if (valid !== null) {
                input.value = valid;
            } else {
                // if the input value is invalid, clear the input value
                input.value = "";
            }
        }
    </script>
</x-app-layout>