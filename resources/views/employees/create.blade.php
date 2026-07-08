<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center space-x-4">
            <a href="{{ route('employees.index') }}" class="p-2 -ml-2 text-slate-400 hover:text-slate-600 transition-colors">
                <i data-lucide="arrow-left" class="w-6 h-6"></i>
            </a>
            <h2 class="text-xl font-bold tracking-tight text-slate-800">
                {{ __('Add Employee') }}
            </h2>
        </div>
    </x-slot>

    <div class="pb-12 max-w-2xl mx-auto">
        <form action="{{ route('employees.store') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
            @csrf

            <!-- Photo Section -->
            <div class="flex flex-col items-center justify-center space-y-4">
                <div x-data="photoCapture({ initial: null })" class="text-center">

                    <input type="file" name="photo" class="hidden" x-ref="photo" accept="image/*"
                        x-on:change="onFileChange($refs.photo)">
                    <canvas x-ref="canvas" class="hidden"></canvas>

                    <!-- Preview circle -->
                    <div class="w-32 h-32 bg-slate-100 rounded-[2rem] border-2 border-dashed border-slate-200 flex items-center justify-center overflow-hidden mx-auto transition-all">
                        <template x-if="!photoPreview">
                            <i data-lucide="camera" class="w-8 h-8 text-slate-300"></i>
                        </template>
                        <template x-if="photoPreview">
                            <img :src="photoPreview" class="w-full h-full object-cover">
                        </template>
                    </div>

                    <!-- Upload / Camera buttons -->
                    <div class="flex justify-center gap-3 mt-5">
                        <button type="button" @click="$refs.photo.click()"
                            class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 shadow-sm hover:border-indigo-400 hover:text-indigo-600 transition-all active:scale-95">
                            <i data-lucide="upload" class="w-4 h-4"></i>
                            Upload
                        </button>
                        <button type="button" @click="openCamera()"
                            class="flex items-center gap-2 px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm font-semibold text-slate-600 shadow-sm hover:border-indigo-400 hover:text-indigo-600 transition-all active:scale-95">
                            <i data-lucide="camera" class="w-4 h-4"></i>
                            Camera
                        </button>
                    </div>
                    <p class="text-[10px] font-bold uppercase tracking-widest text-slate-400 mt-4">Profile Photo</p>
                    @error('photo')<p class="text-rose-500 text-xs mt-1 italic">{{ $message }}</p>@enderror

                    <!-- Camera modal -->
                    <div x-show="showCamera"
                        x-transition:enter="transition ease-out duration-200"
                        x-transition:enter-start="opacity-0"
                        x-transition:enter-end="opacity-100"
                        x-transition:leave="transition ease-in duration-150"
                        x-transition:leave-start="opacity-100"
                        x-transition:leave-end="opacity-0"
                        class="fixed inset-0 z-[200] bg-black flex flex-col"
                        style="display:none">

                        <!-- Viewfinder -->
                        <div class="flex-1 relative overflow-hidden bg-black">
                            <video x-ref="video" autoplay playsinline muted
                                x-show="!capturedImage"
                                class="w-full h-full object-cover"></video>
                            <img x-show="capturedImage" :src="capturedImage"
                                class="w-full h-full object-cover">

                            <!-- Close -->
                            <button type="button" @click="closeCamera()"
                                class="absolute top-5 left-5 w-10 h-10 bg-black/50 backdrop-blur rounded-full flex items-center justify-center text-white active:scale-90 transition-transform">
                                <i data-lucide="x" class="w-5 h-5"></i>
                            </button>

                            <!-- Flip camera (only when live) -->
                            <button type="button" @click="flipCamera()" x-show="!capturedImage"
                                class="absolute top-5 right-5 w-10 h-10 bg-black/50 backdrop-blur rounded-full flex items-center justify-center text-white active:scale-90 transition-transform">
                                <i data-lucide="refresh-cw" class="w-5 h-5"></i>
                            </button>

                            <!-- Camera label -->
                            <div x-show="!capturedImage"
                                class="absolute bottom-4 left-1/2 -translate-x-1/2 px-3 py-1 bg-black/40 backdrop-blur rounded-full text-white text-xs font-semibold tracking-wide">
                                <span x-text="facingMode === 'user' ? 'Front Camera' : 'Back Camera'"></span>
                            </div>
                        </div>

                        <!-- Bottom controls -->
                        <div class="bg-black px-6 flex items-center justify-center" style="padding-top:2rem;padding-bottom:calc(2rem + env(safe-area-inset-bottom, 0px))">
                            <!-- Live: shutter button -->
                            <div x-show="!capturedImage" class="flex items-center justify-center w-full">
                                <button type="button" @click="capture()"
                                    class="w-20 h-20 rounded-full bg-white border-4 border-slate-400 active:scale-90 transition-transform shadow-lg">
                                </button>
                            </div>

                            <!-- After capture: retake / use -->
                            <div x-show="capturedImage" class="flex gap-4 w-full justify-center">
                                <button type="button" @click="retake()"
                                    class="flex-1 max-w-[140px] py-3.5 rounded-2xl border border-white/30 text-white font-semibold active:scale-95 transition-transform">
                                    Retake
                                </button>
                                <button type="button" @click="usePhoto()"
                                    class="flex-1 max-w-[140px] py-3.5 rounded-2xl bg-indigo-600 text-white font-bold active:scale-95 transition-transform shadow-lg shadow-indigo-900/40">
                                    Use Photo
                                </button>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Inputs -->
            <div class="space-y-6">
                <div class="space-y-2">
                    <label for="name" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Full Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('name') border-rose-400 @enderror"
                        placeholder="e.g. John Doe">
                    @error('name')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>

                <div class="space-y-2">
                    <label for="code" class="text-xs font-bold text-slate-400 uppercase tracking-widest px-1">Employee Code</label>
                    <input type="text" name="code" id="code" value="{{ old('code') }}"
                        class="w-full px-5 py-4 bg-white border border-slate-200 rounded-2xl focus:ring-2 focus:ring-indigo-100 focus:border-indigo-400 placeholder-slate-300 text-slate-900 transition-all shadow-sm @error('code') border-rose-400 @enderror"
                        placeholder="e.g. EMP-101">
                    @error('code')<p class="text-rose-500 text-xs px-1 italic">{{ $message }}</p>@enderror
                </div>
            </div>

            <div class="pt-4">
                <button type="submit" class="w-full py-4 bg-indigo-600 text-white rounded-2xl font-bold flex items-center justify-center space-x-2 shadow-lg shadow-indigo-200 active:scale-95 transition-all text-lg">
                    <span>{{ __('Save Employee') }}</span>
                </button>
            </div>
        </form>
    </div>

    <script>
        function photoCapture({ initial }) {
            return {
                photoPreview: initial,
                showCamera: false,
                capturedImage: null,
                facingMode: 'user',
                stream: null,

                onFileChange(input) {
                    if (!input.files[0]) return;
                    const reader = new FileReader();
                    reader.onload = e => { this.photoPreview = e.target.result; };
                    reader.readAsDataURL(input.files[0]);
                },

                async openCamera() {
                    this.showCamera = true;
                    this.capturedImage = null;
                    await this.$nextTick();
                    await this.startStream();
                },

                async startStream() {
                    this.stopStream();
                    try {
                        this.stream = await navigator.mediaDevices.getUserMedia({
                            video: { facingMode: this.facingMode, width: { ideal: 1280 }, height: { ideal: 720 } }
                        });
                        this.$refs.video.srcObject = this.stream;
                    } catch (err) {
                        alert('Camera access denied or unavailable.');
                        this.closeCamera();
                    }
                },

                async flipCamera() {
                    this.facingMode = this.facingMode === 'user' ? 'environment' : 'user';
                    await this.startStream();
                },

                capture() {
                    const video = this.$refs.video;
                    const canvas = this.$refs.canvas;
                    canvas.width = video.videoWidth;
                    canvas.height = video.videoHeight;
                    canvas.getContext('2d').drawImage(video, 0, 0);
                    this.capturedImage = canvas.toDataURL('image/jpeg', 0.92);
                    this.stopStream();
                },

                async usePhoto() {
                    this.photoPreview = this.capturedImage;
                    const res = await fetch(this.capturedImage);
                    const blob = await res.blob();
                    const file = new File([blob], 'camera-capture.jpg', { type: 'image/jpeg' });
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    this.$refs.photo.files = dt.files;
                    this.closeCamera();
                },

                retake() {
                    this.capturedImage = null;
                    this.startStream();
                },

                stopStream() {
                    if (this.stream) {
                        this.stream.getTracks().forEach(t => t.stop());
                        this.stream = null;
                    }
                },

                closeCamera() {
                    this.stopStream();
                    this.capturedImage = null;
                    this.showCamera = false;
                }
            };
        }
    </script>
</x-app-layout>
