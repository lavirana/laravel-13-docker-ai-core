<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Resume Analysis Result') }}
        </h2>
    </x-slot>

    @php
        $result = json_decode($analysis, true);
    @endphp

    <div class="py-12 bg-gray-100 min-h-screen">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-lg rounded-2xl p-8">

                <!-- Heading -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-900">
                        AI Resume Analysis
                    </h1>

                    <p class="text-gray-500 mt-2">
                        Detailed ATS and Resume Review Report
                    </p>
                </div>

                <!-- Scores -->
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">

                    <div class="bg-blue-50 p-6 rounded-xl shadow-sm">
                        <h3 class="text-lg font-semibold text-blue-700">
                            Overall Score
                        </h3>

                        <p class="text-4xl font-bold mt-3 text-blue-900">
                            {{ $result['overall_score'] }}/100
                        </p>
                    </div>

                    <div class="bg-green-50 p-6 rounded-xl shadow-sm">
                        <h3 class="text-lg font-semibold text-green-700">
                            ATS Score
                        </h3>

                        <p class="text-4xl font-bold mt-3 text-green-900">
                            {{ $result['ats_score'] }}/100
                        </p>
                    </div>

                    <div class="bg-purple-50 p-6 rounded-xl shadow-sm">
                        <h3 class="text-lg font-semibold text-purple-700">
                            Recommended Roles
                        </h3>

                        <ul class="mt-3 text-sm text-purple-900 space-y-1">
                            @foreach($result['recommended_roles'] as $role)
                                <li>• {{ $role }}</li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <!-- Summary -->
                <div class="bg-gray-50 p-6 rounded-xl mb-8">
                    <h2 class="text-2xl font-bold mb-4">
                        Summary
                    </h2>

                    <p class="text-gray-700 leading-7">
                        {{ $result['summary'] }}
                    </p>
                </div>

                <!-- Strengths & Weaknesses -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                    <div class="bg-green-50 p-6 rounded-xl">
                        <h2 class="text-2xl font-bold text-green-700 mb-4">
                            Strengths
                        </h2>

                        <ul class="space-y-2">
                            @foreach($result['strengths'] as $strength)
                                <li class="text-gray-700">
                                    ✅ {{ $strength }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                    <div class="bg-red-50 p-6 rounded-xl">
                        <h2 class="text-2xl font-bold text-red-700 mb-4">
                            Weaknesses
                        </h2>

                        <ul class="space-y-2">
                            @foreach($result['weaknesses'] as $weakness)
                                <li class="text-gray-700">
                                    ❌ {{ $weakness }}
                                </li>
                            @endforeach
                        </ul>
                    </div>

                </div>

                <!-- Missing Keywords -->
                <div class="bg-yellow-50 p-6 rounded-xl mb-8">

                    <h2 class="text-2xl font-bold text-yellow-700 mb-4">
                        Missing Keywords
                    </h2>

                    <div class="flex flex-wrap gap-3">

                        @foreach($result['missing_keywords'] as $keyword)

                            <span class="bg-yellow-200 text-yellow-900 px-4 py-2 rounded-full text-sm font-medium">
                                {{ $keyword }}
                            </span>

                        @endforeach

                    </div>

                </div>

                <!-- Suggestions -->
                <div class="bg-blue-50 p-6 rounded-xl mb-8">

                    <h2 class="text-2xl font-bold text-blue-700 mb-4">
                        Suggestions
                    </h2>

                    <ul class="space-y-3">

                        @foreach($result['suggestions'] as $suggestion)

                            <li class="text-gray-700">
                                👉 {{ $suggestion }}
                            </li>

                        @endforeach

                    </ul>

                </div>

                <!-- ATS Issues -->
                <div class="bg-red-50 p-6 rounded-xl mb-8">

                    <h2 class="text-2xl font-bold text-red-700 mb-4">
                        ATS Issues
                    </h2>

                    <ul class="space-y-3">

                        @foreach($result['ats_issues'] as $issue)

                            <li class="text-gray-700">
                                ⚠️ {{ $issue }}
                            </li>

                        @endforeach

                    </ul>

                </div>

                <!-- Rewritten Summary -->
                <div class="bg-purple-50 p-6 rounded-xl">

                    <h2 class="text-2xl font-bold text-purple-700 mb-4">
                        AI Rewritten Professional Summary
                    </h2>

                    <p class="text-gray-700 leading-7">
                        {{ $result['rewritten_summary'] }}
                    </p>

                </div>

            </div>

        </div>
    </div>
</x-app-layout>