<div class="my-4 p-6">
    <div class="grid grid-cols-3 gap-6">
        <div>
            <form>
                <select wire:model="specialty" wire:change="updateCourses" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                    @isset($specialties)
                    @foreach($specialties as $specialty)
                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                    @endforeach
                    @endisset
                </select>
            </form>
        </div>
        <div>
            <select wire:model="course" wire:change="updateStudents" name="course_id" class="mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm !important">
                @isset($courses)
                @foreach($courses as $course)
                <option value="{{ $course->id }}">{{ $course->name }}</option>
                @endforeach
                @endisset
            </select>
        </div>
        <div>

        </div>
    </div>
    <div class="flex flex-col">
        <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
            <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
                <div class="overflow-hidden border rounded">
                    <table class="min-w-full text-center text-sm font-light">
                        <thead class="border-b font-medium dark:border-neutral-500">
                            <tr>
                                <th scope="col" class="px-6 py-4">Matricule</th>
                                <th scope="col" class="px-6 py-4">Name</th>
                                <th scope="col" class="px-6 py-4">Note CC</th>
                                <th scope="col" class="px-6 py-4">Note Examen</th>
                                <th scope="col" class="px-6 py-4">Note Rattrapage</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            @isset($students)
                            @foreach($students as $student)
                            <tr class="border-b transition duration-300 ease-in-out hover:bg-neutral-100 dark:border-neutral-300 dark:hover:bg-neutral-200">
                                <td class="whitespace-nowrap px-6 py-4 font-medium">{{ $student->matricule }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $student->name }}</td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $student->email }}</td>
                                <td class="whitespace-nowrap px-6 py-4">
                                    
                                </td>
                                <td class="whitespace-nowrap px-6 py-4">{{ $student->matricule }}</td>
                            </tr>
                            @endforeach
                            @endisset
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>