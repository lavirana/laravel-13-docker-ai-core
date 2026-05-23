<?php

namespace App\Ai\Agents;

use Illuminate\Contracts\JsonSchema\JsonSchema;
use Laravel\Ai\Contracts\Agent;
use Laravel\Ai\Contracts\Conversational;
use Laravel\Ai\Contracts\HasStructuredOutput;
use Laravel\Ai\Contracts\HasTools;
use Laravel\Ai\Contracts\Tool;
use Laravel\Ai\Messages\Message;
use Laravel\Ai\Promptable;
use Stringable;

class ResumeAnalyzer implements Agent, Conversational, HasStructuredOutput, HasTools
{
    use Promptable;

    /**
     * Get the instructions that the agent should follow.
     */
    public function instructions(): Stringable|string
    {
        return <<<PROMPT
        You are an expert technical recruiter and resume reviewer.;

        Analyze the provided resume and provide feedback on the candidate's experience, skills, and suitability for a software engineering role. Highlight any strengths or weaknesses you identify in the resume.

        Return:
        - Overall score out of 100 based on the candidate's qualifications and how well they match typical software engineering roles.
        - short summary of the candidate's experience and skills.
        - A summary of the candidate's experience and skills.
        - An assessment of their suitability for a software engineering role.
        - Any recommendations for improvement.
        - Better rewritten professinal summary.
        - Strengths
        - Weaknesses
        - missing key skills or experience
        - Suitable Job Roles.
        - ATS Score
        - ATS Issues

        Do not include any information that is not relevant to the analysis of the resume. Be concise and focus on the most important aspects of the candidate's background and qualifications.
        PROMPT;
    }

    /**
     * Get the list of messages comprising the conversation so far.
     *
     * @return Message[]
     */
    public function messages(): iterable
    {
        return [];
    }

    /**
     * Get the tools available to the agent.
     *
     * @return Tool[]
     */
    public function tools(): iterable
    {
        return [];
    }

    /**
     * Get the agent's structured output schema definition.
     */
    public function schema(JsonSchema $schema): array
    {
        return [
            'overall_score' => $schema->integer()->required(),
            'ats_score' => $schema->integer()->required(),
            'summary' => $schema->string()->required(),
            'strengths' => $schema->array()->items($schema->string())->required(),
            'weaknesses' => $schema->array()->items($schema->string())->required(),
            'missing_keywords' => $schema->array()->items($schema->string())->required(),
            'suggestions' => $schema->array()->items($schema->string())->required(),
            'ats_issues' => $schema->array()->items($schema->string())->required(),
            'recommended_roles' => $schema->array()->items($schema->string())->required(),
            'rewritten_summary' => $schema->string()->required(),
        ];
    }
}
