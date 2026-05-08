<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
               

                <div style="background: #0f172a; padding: 20px; border-radius: 10px; color: #fff;">
                    <h3>AI Intro Generator</h3>
                    <input type="text" id="blog_title" placeholder="Enter Blog Title..." style="width:100%; padding:10px; background:#1e293b; color:#fff; border:1px solid #334155;">
                    <button onclick="getAIIntro()" style="background:#4285F4; color:#fff; margin-top:10px; padding:10px 20px; border:none; cursor:pointer;">Generate Intro</button>
                    
                    <div id="ai_output" style="margin-top:20px; color:#94a3b8; font-style:italic;"></div>
                </div>
                
            


            </div>
        </div>
    </div>
</x-app-layout>
