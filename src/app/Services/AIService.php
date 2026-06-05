<?php
namespace App\Services;

use Illuminate\Support\Facades\Http;

class AIService
{
    public function ask(string $prompt, string $provider = null, array $options = []): string
    {
        $provider ??= config('ai.default_provider', 'gemini');

        return match($provider) {
            'gemini' => $this->askGemini($prompt, $options),
            'openai' => $this->askOpenAI($prompt, $options),
            'ollama' => $this->askOllama($prompt, $options),
            default  => throw new \InvalidArgumentException("Unknown provider: $provider"),
        };
    }

    private function askGemini(string $prompt, array $options): string
    {
        $key   = config('ai.gemini.key');
        $model = $options['model'] ?? 'gemini-2.0-flash';

        $res = Http::post(
            "https://generativelanguage.googleapis.com/v1beta/models/{$model}:generateContent?key={$key}",
            ['contents' => [['parts' => [['text' => $prompt]]]]]
        );

        return $res->json('candidates.0.content.parts.0.text', '');
    }

    private function askOpenAI(string $prompt, array $options): string
    {
        $res = Http::withToken(config('ai.openai.key'))
            ->post('https://api.openai.com/v1/chat/completions', [
                'model'    => $options['model'] ?? 'gpt-4o-mini',
                'messages' => [['role' => 'user', 'content' => $prompt]],
            ]);

        return $res->json('choices.0.message.content', '');
    }

    private function askOllama(string $prompt, array $options): string
    {
        $res = Http::post(config('ai.ollama.base_url') . '/api/generate', [
            'model'  => $options['model'] ?? config('ai.ollama.model', 'llama3'),
            'prompt' => $prompt,
            'stream' => false,
        ]);

        return $res->json('response', '');
    }
}
