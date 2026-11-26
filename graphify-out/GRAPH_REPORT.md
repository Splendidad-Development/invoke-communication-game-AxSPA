# Graph Report - invoke-communication-game  (2026-11-26)

## Corpus Check
- 104 files · ~24,964 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 23 file(s) not represented in the graph (top: (none) 17, .example 1, .pptx 1)

## Summary
- 715 nodes · 1131 edges · 56 communities (33 shown, 23 thin omitted)
- Extraction: 96% EXTRACTED · 4% INFERRED · 0% AMBIGUOUS · INFERRED: 46 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `6a37227d`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- SymphonyBoard
- ResultModal.vue
- package.json
- App\Models\Arrangement
- GameFlowTest.php
- Illuminate\Database\Schema\Blueprint
- Board.vue
- types/game.ts
- with
- compilerOptions
- resources_js_types_index_gameimage
- AppServiceProvider.php
- index.ts
- scripts
- useStickyEdgeScroll
- SymphonyBoard.php
- require-dev
- updates
- composer.json
- bootstrap/app.php
- useBoardArrangement
- PlayerExport
- config
- Pest.php
- require
- psr-4
- LeaderboardModal.vue
- extra
- pnpm-workspace.yaml
- User.php
- symphony.ts
- BoardSlot.vue
- vue
- LeaderboardButton.vue
- GameModal.vue
- UserFactory.php
- ExportTest.php
- PlayerExport.php
- Answer
- Illuminate\Database\Eloquent\Factories\Factory
- lib/game.ts
- SymphonyNotes.vue

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 32 edges
2. `compilerOptions` - 19 edges
3. `vue` - 17 edges
4. `PlayerExport` - 14 edges
5. `scripts` - 13 edges
6. `Arrangement` - 12 edges
7. `require-dev` - 12 edges
8. `playAs()` - 11 edges
9. `Answer` - 11 edges
10. `Player` - 11 edges

## Surprising Connections (you probably didn't know these)
- `{closure#2}()` --references--> `Arrangement`  [EXTRACTED]
  app/Http/Middleware/HandleInertiaRequests.php → app/Models/Arrangement.php
- `PlayerExport` --references--> `SymphonyBoard`  [EXTRACTED]
  app/PlayerExport.php → app/SymphonyBoard.php
- `ExportController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/ExportController.php → app/Http/Controllers/Controller.php
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts
- `AnswerController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/AnswerController.php → app/Http/Controllers/Controller.php

## Import Cycles
- None detected.

## Communities (56 total, 23 thin omitted)

### Community 0 - "SymphonyBoard"
Cohesion: 0.05
Nodes (16): AnswerController, ArrangementController, BoardController, Controller, GameController, PlayerController, EnsurePlayerSession, {closure#1}() (+8 more)

### Community 1 - "ResultModal.vue"
Cohesion: 0.19
Nodes (11): close(), emit, hasPlayed, isPlaying, leaderboard, notes, openLeaderboard(), player (+3 more)

### Community 2 - "package.json"
Cohesion: 0.05
Nodes (52): dependencies, clsx@^2.1.1, concurrently@^10.0.3, @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, tailwind-merge@^3.2.0, tailwindcss@^4.1.1, @tailwindcss/vite@^4.1.11 (+44 more)

### Community 4 - "GameFlowTest.php"
Cohesion: 0.07
Nodes (26): ArrangementFactory, {closure#11}(), {closure#12}(), {closure#13}(), {closure#14}(), {closure#15}(), {closure#16}(), {closure#17}() (+18 more)

### Community 5 - "Illuminate\Database\Schema\Blueprint"
Cohesion: 0.10
Nodes (11): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#1}(), {closure#2}(), {closure#3}() (+3 more)

### Community 6 - "Board.vue"
Cohesion: 0.06
Nodes (24): imageMap(), board, BoardView, edgeScroll, imagesById, isLocked, isMistakesOpen, { isPhone, usesDragHandle } (+16 more)

### Community 7 - "types/game.ts"
Cohesion: 0.10
Nodes (20): Auth, User, ArrangementResult, BoardSection, ColumnTone, GameImage, Group, GroupCard (+12 more)

### Community 8 - "with"
Cohesion: 0.10
Nodes (20): runs-on, steps, jobs, ci, name, on, pull_request, push (+12 more)

### Community 9 - "compilerOptions"
Cohesion: 0.10
Nodes (20): compilerOptions, allowJs, esModuleInterop, forceConsistentCasingInFileNames, isolatedModules, jsx, jsxImportSource, lib (+12 more)

### Community 10 - "resources_js_types_index_gameimage"
Cohesion: 0.18
Nodes (4): emit, emit, emit, BoardColumn

### Community 12 - "index.ts"
Cohesion: 0.13
Nodes (3): @inertiajs/vue3@^3.0.0, @inertiajs/vue3, answer

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "useStickyEdgeScroll"
Cohesion: 0.52
Nodes (6): useStickyEdgeScroll(), onPointerMove(), scrollDirection(), start(), stop(), tick()

### Community 15 - "SymphonyBoard.php"
Cohesion: 0.14
Nodes (4): {closure#3}(), {closure#4}(), {closure#5}(), {closure#7}()

### Community 16 - "require-dev"
Cohesion: 0.17
Nodes (12): require-dev, fakerphp/faker, larastan/larastan, laravel/boost, laravel/pail, laravel/pao, laravel/pint, laravel/sail (+4 more)

### Community 17 - "updates"
Cohesion: 0.17
Nodes (11): default-days, patterns, github-actions, interval, updates, cooldown, directory, groups (+3 more)

### Community 18 - "composer.json"
Cohesion: 0.18
Nodes (10): autoload-dev, psr-4, description, keywords, license, minimum-stability, name, Tests\\ (+2 more)

### Community 19 - "bootstrap/app.php"
Cohesion: 0.28
Nodes (3): {closure#1}(), {closure#2}(), {closure#3}()

### Community 20 - "useBoardArrangement"
Cohesion: 0.29
Nodes (7): TRAY, useBoardArrangement(), place(), removeFromTray(), reset(), slotOf(), shuffle()

### Community 22 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 24 - "require"
Cohesion: 0.25
Nodes (8): require, barryvdh/laravel-dompdf, inertiajs/inertia-laravel, laravel/framework, laravel/tinker, laravel/wayfinder, openspout/openspout, php

### Community 25 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 27 - "LeaderboardModal.vue"
Cohesion: 0.17
Nodes (8): filter, filters, isPlaying(), leaderboard, player, playKey(), rows, summary

### Community 30 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 43 - "symphony.ts"
Cohesion: 0.23
Nodes (14): currentStep, playingKey, useSymphonyPlayer(), play(), stop(), toggle(), CHORDS, hz() (+6 more)

### Community 44 - "BoardSlot.vue"
Cohesion: 0.15
Nodes (13): vue-draggable-plus@^0.6.1, vue-draggable-plus, emit, { isPhone, usesDragHandle }, list, onAdd(), props, DeviceLayout (+5 more)

### Community 45 - "vue"
Cohesion: 0.17
Nodes (7): vue, answerCount, boardCount, ExportAnswer, ExportPlayer, props, *.vue

### Community 46 - "LeaderboardButton.vue"
Cohesion: 0.33
Nodes (5): isLoading, isOpen, useLeaderboard(), open(), refresh()

### Community 47 - "GameModal.vue"
Cohesion: 0.13
Nodes (20): activate(), deactivate(), emit, id, isMounted, isTopmost(), onKeydown(), openStack (+12 more)

### Community 50 - "ExportTest.php"
Cohesion: 0.27
Nodes (5): asExporter(), {closure#4}(), {closure#5}(), {closure#6}(), {closure#7}()

### Community 52 - "Answer"
Cohesion: 0.25
Nodes (3): Answer, {closure#1}(), {closure#10}()

### Community 54 - "lib/game.ts"
Cohesion: 0.21
Nodes (8): emit, props, slotStyle, colourKey, dragHandleOptions, RESULT_PLAYER_KEY, sectionToneClasses, verdictFor()

### Community 58 - "SymphonyNotes.vue"
Cohesion: 0.31
Nodes (5): leaderboard, barClass(), props, noteHeight(), cn()

## Knowledge Gaps
- **23 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vue` connect `vue` to `ResultModal.vue`, `package.json`, `Board.vue`, `types/game.ts`, `symphony.ts`, `BoardSlot.vue`, `index.ts`, `LeaderboardButton.vue`, `GameModal.vue`, `useStickyEdgeScroll`, `useBoardArrangement`, `lib/game.ts`, `LeaderboardModal.vue`?**
  _High betweenness centrality (0.050) - this node is a cross-community bridge._
- **Should `SymphonyBoard` be split into smaller, more focused modules?**
  _Cohesion score 0.05308641975308642 - nodes in this community are weakly interconnected._
- **Why does `SymphonyBoard` connect `SymphonyBoard` to `AppServiceProvider.php`, `GameFlowTest.php`, `PlayerExport`, `SymphonyBoard.php`?**
  _High betweenness centrality (0.044) - this node is a cross-community bridge._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.053109713487071976 - nodes in this community are weakly interconnected._
- **Why does `@inertiajs/vue3` connect `index.ts` to `ResultModal.vue`, `package.json`, `Board.vue`, `vue`, `LeaderboardButton.vue`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **Should `GameFlowTest.php` be split into smaller, more focused modules?**
  _Cohesion score 0.07171717171717172 - nodes in this community are weakly interconnected._
- **Should `Illuminate\Database\Schema\Blueprint` be split into smaller, more focused modules?**
  _Cohesion score 0.10483870967741936 - nodes in this community are weakly interconnected._