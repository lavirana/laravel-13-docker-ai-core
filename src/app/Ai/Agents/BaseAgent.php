<?php
namespace App\Ai\Agents;

use App\Services\AIService;

abstract class BaseAgent
{
    protected string $provider = 'gemini';
    protected array  $tools    = [];

    public function __construct(protected AIService $ai) {}

    abstract protected function systemPrompt(): string;

    public function execute(array $input): array
    {
        $toolResults = $this->runTools($input);
        $prompt      = $this->buildPrompt($input, $toolResults);
        $raw         = $this->ai->ask($prompt, $this->provider);
        return $this->parseResponse($raw);
    }

    protected function buildPrompt(array $input, array $toolResults): string
    {
        $system  = $this->systemPrompt();
        $context = empty($toolResults)
            ? ''
            : "\n\nTool results:\n" . json_encode($toolResults, JSON_PRETTY_PRINT);
        $userMsg = $input['message'] ?? json_encode($input);
        return "{$system}{$context}\n\nUser: {$userMsg}\n\nRespond ONLY with valid JSON.";
    }

    protected function runTools(array $input): array
    {
        $results = [];
        foreach ($this->tools as $tool) {
            $results[$tool->name()] = $tool->run($input);
        }
        return $results;
    }

    protected function parseResponse(string $raw): array
    {
        $clean = preg_replace('/^```(?:json)?\n?|```$/m', '', trim($raw));
        return json_decode($clean, true) ?? ['raw' => $raw];
    }
}
