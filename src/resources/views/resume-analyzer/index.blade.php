<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>
    <script src="https://cdn.tailwindcss.com"></script>


    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">

<div class="relative overflow-hidden">

    <!-- Background Blur -->
    <div class="absolute inset-0 -z-10">
        <div class="absolute top-40 left-1/2 h-96 w-96 -translate-x-1/2 rounded-full bg-indigo-200/40 blur-3xl"></div>

        <div class="absolute top-20 right-0 h-96 w-96 rounded-full bg-blue-200/40 blur-3xl"></div>
    </div>

    <!-- Header -->
    <header class="mx-auto flex max-w-6xl items-center justify-between px-6 py-6">

        <div class="flex items-center gap-3">

            <div class="grid h-10 w-10 place-items-center rounded-2xl bg-slate-950 text-white shadow-lg">
                AI
            </div>

            <div>
                <h1 class="text-lg font-bold">
                    ResumeIQ
                </h1>

                <p class="text-xs text-slate-500">
                    AI Resume Analyzer
                </p>
            </div>

        </div>

        <span class="rounded-full border border-slate-200 bg-white/70 px-4 py-2 text-sm text-slate-600 shadow-sm">
            Powered by Laravel AI
        </span>

    </header>

    <!-- Main -->
    <main class="mx-auto grid max-w-6xl gap-10 px-6 pb-16 pt-8 lg:grid-cols-[1fr_440px] lg:items-center">

        <!-- Left -->
        <section>

            <h2 class="mt-6 max-w-3xl text-5xl font-extrabold tracking-tight text-slate-950 md:text-6xl">
                Analyze your resume with AI in seconds.
            </h2>

            <p class="mt-6 max-w-2xl text-lg leading-8 text-slate-600">
                Upload your PDF resume and get a professional review,
                ATS score, missing keywords, strengths, weaknesses,
                and a rewritten profile summary.
            </p>

            <!-- Features -->
            <div class="mt-8 grid max-w-2xl gap-4 sm:grid-cols-3">

                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <p class="text-2xl font-bold">
                        ATS
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Score check
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <p class="text-2xl font-bold">
                        AI
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Resume review
                    </p>
                </div>

                <div class="rounded-2xl bg-white p-5 shadow-sm ring-1 ring-slate-200">
                    <p class="text-2xl font-bold">
                        PDF
                    </p>

                    <p class="mt-1 text-sm text-slate-500">
                        Upload parser
                    </p>
                </div>

            </div>

        </section>

        <!-- Right Form -->
        <section class="rounded-3xl bg-white p-8 shadow-xl ring-1 ring-slate-200">

            <form
                method="POST"
                action="{{ route('resume-analyzer.analyze') }}"
                enctype="multipart/form-data"
                class="space-y-5"
                id="resumeForm"
            >

                @csrf

                <div class="mb-6">

                    <h3 class="text-2xl font-bold">
                        Upload resume
                    </h3>

                    <p class="mt-1 text-sm text-slate-500">
                        PDF only. Add a job description for targeted analysis.
                    </p>

                </div>

                <!-- Validation Errors -->
                @if ($errors->any())
                    <div class="rounded-2xl border border-red-200 bg-red-50 p-4 text-red-700">

                        <ul class="list-disc pl-5 text-sm">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>

                    </div>
                @endif

                <!-- Resume -->
                <div>

                    <label class="mb-2 block text-sm font-medium">
                        Resume PDF
                    </label>

                    <input
                        type="file"
                        name="resume"
                        accept=".pdf"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                    >

                </div>

                <!-- Job Description -->
                <div>

                    <label class="mb-2 block text-sm font-medium">
                        Job Description
                    </label>

                    <textarea
                        name="job_description"
                        rows="6"
                        class="w-full rounded-xl border border-slate-300 px-4 py-3"
                        placeholder="Paste job description..."
                    ></textarea>

                </div>

                <!-- Button -->
                <button
                    type="submit"
                    id="analyzeBtn"
                    class="flex w-full items-center justify-center gap-3 rounded-2xl bg-slate-950 px-6 py-4 text-white transition hover:opacity-90"
                >

                    <span id="buttonText">
                        Analyze Resume
                    </span>

                    <span id="buttonArrow">
                        →
                    </span>

                    <svg
                        id="loadingIcon"
                        class="hidden h-5 w-5 animate-spin"
                        xmlns="http://www.w3.org/2000/svg"
                        fill="none"
                        viewBox="0 0 24 24"
                    >
                        <circle
                            class="opacity-25"
                            cx="12"
                            cy="12"
                            r="10"
                            stroke="currentColor"
                            stroke-width="4"
                        ></circle>

                        <path
                            class="opacity-75"
                            fill="currentColor"
                            d="M4 12a8 8 0 018-8v8H4z"
                        ></path>
                    </svg>
                </button>
            </form>
        </section>
    </main>
</div>
        </div>
    </div>
</x-app-layout>
