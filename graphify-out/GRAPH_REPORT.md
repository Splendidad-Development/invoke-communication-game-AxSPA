# Graph Report - invoke-communication-game  (2026-11-27)

## Corpus Check
- 104 files · ~25,183 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 24 file(s) not represented in the graph (top: (none) 18, .example 1, .pptx 1)

## Summary
- 716 nodes · 1132 edges · 55 communities (31 shown, 24 thin omitted)
- Extraction: 96% EXTRACTED · 4% INFERRED · 0% AMBIGUOUS · INFERRED: 45 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `ca73ecb2`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- .store
- ResultModal.vue
- package.json
- App\Models\Answer
- GameFlowTest.php
- Illuminate\Database\Schema\Blueprint
- Board.vue
- types/game.ts
- with
- compilerOptions
- resources_js_types_index_gameimage
- AppServiceProvider.php
- vue
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
- Illuminate\Http\Request
- symphony.ts
- BoardSlot.vue
- SymphonyBoard
- LeaderboardButton.vue
- GameModal.vue
- web.php
- Question.vue
- @inertiajs/vue3
- DatabaseSeeder.php
- lib/game.ts

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 35 edges
2. `compilerOptions` - 19 edges
3. `vue` - 17 edges
4. `PlayerExport` - 14 edges
5. `scripts` - 13 edges
6. `Arrangement` - 12 edges
7. `require-dev` - 12 edges
8. `Answer` - 11 edges
9. `Player` - 11 edges
10. `playAs()` - 11 edges

## Surprising Connections (you probably didn't know these)
- `{closure#2}()` --references--> `Arrangement`  [EXTRACTED]
  app/Http/Middleware/HandleInertiaRequests.php → app/Models/Arrangement.php
- `PlayerExport` --references--> `SymphonyBoard`  [EXTRACTED]
  app/PlayerExport.php → app/SymphonyBoard.php
- `ExportController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/ExportController.php → app/Http/Controllers/Controller.php
- `PlayerController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/PlayerController.php → app/Http/Controllers/Controller.php
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts

## Import Cycles
- None detected.

## Communities (55 total, 24 thin omitted)

### Community 0 - ".store"
Cohesion: 0.13
Nodes (4): PlayerController, StoreAnswerRequest, StoreArrangementRequest, StorePlayerRequest

### Community 1 - "ResultModal.vue"
Cohesion: 0.17
Nodes (12): close(), emit, hasPlayed, isPlaying, leaderboard, notes, openLeaderboard(), player (+4 more)

### Community 2 - "package.json"
Cohesion: 0.05
Nodes (53): dependencies, clsx@^2.1.1, concurrently@^10.0.3, @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, tailwind-merge@^3.2.0, tailwindcss@^4.1.1, @tailwindcss/vite@^4.1.11 (+45 more)

### Community 3 - "App\Models\Answer"
Cohesion: 0.06
Nodes (11): Answer, Arrangement, Player, User, {closure#1}(), {closure#2}(), {closure#3}(), AnswerFactory (+3 more)

### Community 4 - "GameFlowTest.php"
Cohesion: 0.07
Nodes (31): asExporter(), {closure#4}(), {closure#5}(), {closure#6}(), {closure#7}(), {closure#10}(), {closure#11}(), {closure#12}() (+23 more)

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

### Community 12 - "vue"
Cohesion: 0.15
Nodes (8): vue@^3.5.13, vue, answerCount, boardCount, ExportAnswer, ExportPlayer, props, *.vue

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "useStickyEdgeScroll"
Cohesion: 0.52
Nodes (6): useStickyEdgeScroll(), onPointerMove(), scrollDirection(), start(), stop(), tick()

### Community 15 - "SymphonyBoard.php"
Cohesion: 0.14
Nodes (5): {closure#12}(), {closure#3}(), {closure#4}(), {closure#5}(), {closure#7}()

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
Cohesion: 0.15
Nodes (6): {closure#1}(), {closure#2}(), HandleInertiaRequests, {closure#1}(), {closure#2}(), {closure#3}()

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

### Community 42 - "Illuminate\Http\Request"
Cohesion: 0.20
Nodes (5): AnswerController, ArrangementController, BoardController, Controller, GameController

### Community 43 - "symphony.ts"
Cohesion: 0.23
Nodes (14): currentStep, playingKey, useSymphonyPlayer(), play(), stop(), toggle(), CHORDS, hz() (+6 more)

### Community 44 - "BoardSlot.vue"
Cohesion: 0.16
Nodes (12): emit, { isPhone, usesDragHandle }, list, onAdd(), props, DeviceLayout, isPhone, isTouch (+4 more)

### Community 46 - "LeaderboardButton.vue"
Cohesion: 0.24
Nodes (6): leaderboard, isLoading, isOpen, useLeaderboard(), open(), refresh()

### Community 47 - "GameModal.vue"
Cohesion: 0.10
Nodes (24): activate(), deactivate(), emit, id, isMounted, isTopmost(), onKeydown(), openStack (+16 more)

### Community 54 - "lib/game.ts"
Cohesion: 0.27
Nodes (6): emit, props, slotStyle, colourKey, sectionToneClasses, verdictFor()

## Knowledge Gaps
- **24 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vue` connect `vue` to `ResultModal.vue`, `package.json`, `Board.vue`, `types/game.ts`, `symphony.ts`, `BoardSlot.vue`, `LeaderboardButton.vue`, `GameModal.vue`, `useStickyEdgeScroll`, `Question.vue`, `useBoardArrangement`, `lib/game.ts`, `LeaderboardModal.vue`?**
  _High betweenness centrality (0.050) - this node is a cross-community bridge._
- **Should `.store` be split into smaller, more focused modules?**
  _Cohesion score 0.12987012987012986 - nodes in this community are weakly interconnected._
- **Why does `SymphonyBoard` connect `SymphonyBoard` to `.store`, `App\Models\Answer`, `GameFlowTest.php`, `Illuminate\Http\Request`, `AppServiceProvider.php`, `SymphonyBoard.php`, `PlayerExport`?**
  _High betweenness centrality (0.049) - this node is a cross-community bridge._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.05194805194805195 - nodes in this community are weakly interconnected._
- **Why does `@inertiajs/vue3` connect `@inertiajs/vue3` to `ResultModal.vue`, `package.json`, `Board.vue`, `vue`, `LeaderboardButton.vue`, `Question.vue`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **Should `App\Models\Answer` be split into smaller, more focused modules?**
  _Cohesion score 0.055811571940604196 - nodes in this community are weakly interconnected._
- **Should `GameFlowTest.php` be split into smaller, more focused modules?**
  _Cohesion score 0.07030527289546716 - nodes in this community are weakly interconnected._