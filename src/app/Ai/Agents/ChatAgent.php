<?php
namespace App\Ai\Agents;

class ChatAgent extends BaseAgent
{
    protected string $provider = 'gemini';

    protected function systemPrompt(): string
    {
        return 'You are a helpful assistant. Reply ONLY with valid JSON:
{"reply": "your response", "suggestions": ["follow up 1", "follow up 2"]}';
    }
}
