<!DOCTYPE html>
<html lang="en">

<x-head title="My App" description="This is my app." />

<body>
    <header>
        <x-nav />
    </header>

    <main>
        <div id="stepper" class="relative mb-12 w-3/4 object-center mx-auto mt-10">
            <ol class="flex items-center w-full mb-6" x-data="{
                currentSteps: 1,
                stepLabels: [
                    'request',
                    'gis',
                    'typeRequester',
                    'document',
                    'project'
                ]
            }">
                <template x-for="(label, index) in stepLabels" :key="index">
                    <li class="relative flex-1 flex items-center" :data-step="index + 1">
                        <div class="w-10 h-10 flex items-center justify-center rounded-full font-bold transition-all"
                            :class="{
                                'bg-primary text-white': currentSteps > index,
                                'bg-gray-300 text-gray-600': currentSteps <= index
                            }">
                            <span x-text="index + 1"></span>
                        </div>
                        <span class="absolute top-12 text-sm font-medium text-gray-600" x-text="label"></span>
                        <template x-if="index < stepLabels.length - 1">
                            <div class="flex-1 h-1"
                                :class="{
                                    'bg-primary': currentSteps > index + 1,
                                    'bg-gray-300': currentSteps <= index + 1
                                }">
                            </div>
                        </template>
                    </li>
                </template>
            </ol>
        </div>

        <form id="multi-step-form" method="POST" action="{{ route('addData.store') }}" x-data="stepForm"
            x-init="init()" class="space-y-6" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="current_step" :value="currentSteps">
            <div class="w-3/4 mx-auto p-6 bg-white">
                <div class="space-y-6">

                    <div x-show="currentSteps === 1">
                        @yield('step-1')
                    </div>

                    <div x-show="currentSteps === 2">
                        @yield('step-2')
                    </div>

                    <div x-show="currentSteps === 3">
                        @yield('step-3')
                    </div>

                    <div x-show="currentSteps === 4">
                        @yield('step-4')
                    </div>

                    <div x-show="currentSteps === 5">
                        @yield('step-5')
                    </div>
                    <input type="hidden" name="current_step" :value="currentSteps">
                    <!-- Navigation Buttons -->
                    <div class="flex justify-between mt-4">
                        <button type="button" @click="prev"
                            class="btn bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg"
                            x-show="currentSteps > 1">Back</button>


                        <button type="submit" name="action" value="draft" class="bg-yellow-400 px-4 py-2 rounded">
                            Save Draft
                        </button>


                        <button type="button" @click="next"
                            class="btn bg-primary hover:bg-primary-600 text-white px-4 py-2 rounded-lg"
                            x-show="currentSteps < totalSteps">Next</button>

                        <button type="submit" @click.prevent="finish"
                            class="btn bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded-lg"
                            x-show="currentSteps === totalSteps">Finish</button>
                    </div>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <x-footer />
    </footer>

    <!-- Alpine.js Step Form Logic -->
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('stepForm', () => ({
                currentSteps: 1,
                totalSteps: 5,
                next() {
                    if (this.currentSteps < this.totalSteps) {
                        this.currentSteps++;
                        this.syncStepper();
                    }
                },
                prev() {
                    if (this.currentSteps > 1) {
                        this.currentSteps--;
                        this.syncStepper();
                    }
                },
                finish() {
                    this.syncStepper();
                    document.getElementById('multi-step-form').submit();
                },
                syncStepper() {
                    const stepper = document.querySelector('#stepper');
                    if (!stepper) return;
                    const lis = stepper.querySelectorAll('li');

                    lis.forEach((li, index) => {
                        const circle = li.querySelector('div');
                        const line = li.querySelector('div:last-child');
                        if (index < this.currentSteps) {
                            circle.classList.add('bg-primary', 'text-white');
                            circle.classList.remove('bg-gray-300', 'text-gray-600');
                            if (line) {
                                line.classList.add('bg-primary');
                                line.classList.remove('bg-gray-300');
                            }
                        } else {
                            circle.classList.add('bg-gray-300', 'text-gray-600');
                            circle.classList.remove('bg-primary', 'text-white');
                            if (line) {
                                line.classList.add('bg-gray-300');
                                line.classList.remove('bg-primary');
                            }
                        }
                    });
                },
                init() {
                    this.syncStepper();
                }
            }));
        });
    </script>

    @stack('script')
</body>

</html>
