<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use OpenAI\Laravel\Facades\OpenAI;

class AIContentController extends Controller
{

    public function generateIntro(Request $request)
    {
        $title = $request->input('title');

        if (!env('OPENAI_API_KEY')) {
            return response()->json(['error' => 'API Key is missing in .env'], 500);
        }

        $result = OpenAI::chat()->create([
            'model' => 'gpt-4o',
            'messages' => [
                ['role' => 'system', 'content' => 'You are a professional tech blogger. Write a short, engaging intro in very simple English.'],
                ['role' => 'user', 'content' => 'Write a blog intro for the title: ' . $title],
            ],
        ]);
        return response()->json([
            'intro' => $result->choices[0]->message->content
        ]);
    }

}
