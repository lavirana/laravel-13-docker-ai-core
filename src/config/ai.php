<?php
return [
    'default_provider' => env('AI_DEFAULT_PROVIDER', 'gemini'),
    'gemini' => [
        'key' => env('GEMINI_API_KEY'),
    ],
    'openai' => [
        'key' => env('OPENAI_API_KEY'),
    ],
    'ollama' => [
        'base_url' => env('OLLAMA_BASE_URL', 'http://host.docker.internal:11434'),
        'model'    => env('OLLAMA_MODEL', 'llama3'),
    ],
];
