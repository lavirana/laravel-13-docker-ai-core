<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Ai\Agents\{ ProductAgent, ResumeAnalyzer, ChatAgent };

class AgentController extends Controller
{
    
    public function run(Request $request, string $agent)
    {
        $agentClass = match($agent) {
            'product' => ProductAgent::class,
            'resume'  => ResumeAnalyzer::class,
            'chat'    => ChatAgent::class,
            default   => throw new \InvalidArgumentException("Unknown agent: $agent"),
        };

        $instance = app($agentClass);
        $result = $instance->execute($request->all());

        return response()->json($result);
    }

}
