# Graph Report - invoke-communication-game  (2026-11-23)

## Corpus Check
- 96 files · ~21,554 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 22 file(s) not represented in the graph (top: (none) 17, .example 1, .neon 1)

## Summary
- 633 nodes · 975 edges · 49 communities (32 shown, 17 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 30 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `f7ca115c`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- SymphonyBoard
- symphony.ts
- package.json
- Answer
- GameFlowTest.php
- Illuminate\Database\Schema\Blueprint
- Board.vue
- types/game.ts
- with
- compilerOptions
- index.ts
- AppServiceProvider.php
- ResultModal.vue
- scripts
- global.d.ts
- SymphonyBoard.php
- require-dev
- updates
- composer.json
- vue
- useBoardArrangement
- ImagePickerModal.vue
- config
- Pest.php
- require
- psr-4
- StoreArrangementRequest
- extra
- pnpm-workspace.yaml
- LeaderboardModal.vue
- bootstrap/app.php
- BoardSlot.vue
- lib/game.ts
- LeaderboardButton.vue
- GameModal.vue
- MistakesModal.vue

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 30 edges
2. `compilerOptions` - 19 edges
3. `vue` - 14 edges
4. `scripts` - 13 edges
5. `Arrangement` - 12 edges
6. `require-dev` - 12 edges
7. `playAs()` - 11 edges
8. `Answer` - 11 edges
9. `Player` - 11 edges
10. `@inertiajs/vue3` - 10 edges

## Surprising Connections (you probably didn't know these)
- `{closure#2}()` --references--> `Arrangement`  [EXTRACTED]
  app/Http/Middleware/HandleInertiaRequests.php → app/Models/Arrangement.php
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts
- `BoardController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/BoardController.php → app/Http/Controllers/Controller.php
- `imagesById` --calls--> `imageMap()`  [EXTRACTED]
  resources/js/pages/game/Board.vue → resources/js/lib/game.ts
- `InertiaConfig` --references--> `LeaderboardEntry`  [EXTRACTED]
  resources/js/types/global.d.ts → resources/js/types/game.ts

## Import Cycles
- None detected.

## Communities (49 total, 17 thin omitted)

### Community 0 - "SymphonyBoard"
Cohesion: 0.06
Nodes (15): AnswerController, ArrangementController, BoardController, Controller, GameController, PlayerController, EnsurePlayerSession, {closure#1}() (+7 more)

### Community 1 - "symphony.ts"
Cohesion: 0.23
Nodes (14): currentStep, playingKey, useSymphonyPlayer(), play(), stop(), toggle(), CHORDS, hz() (+6 more)

### Community 2 - "package.json"
Cohesion: 0.05
Nodes (51): dependencies, clsx@^2.1.1, concurrently@^10.0.3, @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, tailwind-merge@^3.2.0, tailwindcss@^4.1.1, @tailwindcss/vite@^4.1.11 (+43 more)

### Community 3 - "Answer"
Cohesion: 0.07
Nodes (5): User, ArrangementFactory, PlayerFactory, UserFactory, DatabaseSeeder

### Community 4 - "GameFlowTest.php"
Cohesion: 0.10
Nodes (24): {closure#10}(), {closure#11}(), {closure#12}(), {closure#13}(), {closure#14}(), {closure#15}(), {closure#16}(), {closure#17}() (+16 more)

### Community 5 - "Illuminate\Database\Schema\Blueprint"
Cohesion: 0.10
Nodes (11): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#1}(), {closure#2}(), {closure#3}() (+3 more)

### Community 6 - "Board.vue"
Cohesion: 0.06
Nodes (18): imageMap(), board, edgeScroll, imagesById, isLocked, isMistakesOpen, isResultOpen, isSubmitting (+10 more)

### Community 7 - "types/game.ts"
Cohesion: 0.12
Nodes (5): @inertiajs/vue3@^3.0.0, @inertiajs/vue3, answer, Group, Player

### Community 8 - "with"
Cohesion: 0.10
Nodes (20): runs-on, steps, jobs, ci, name, on, pull_request, push (+12 more)

### Community 9 - "compilerOptions"
Cohesion: 0.10
Nodes (20): compilerOptions, allowJs, esModuleInterop, forceConsistentCasingInFileNames, isolatedModules, jsx, jsxImportSource, lib (+12 more)

### Community 10 - "index.ts"
Cohesion: 0.15
Nodes (10): emit, emit, ArrangementResult, BoardColumn, BoardSection, ColumnTone, GameImage, GroupCard (+2 more)

### Community 12 - "ResultModal.vue"
Cohesion: 0.19
Nodes (10): close(), emit, hasPlayed, isPlaying, leaderboard, notes, openLeaderboard(), player (+2 more)

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "global.d.ts"
Cohesion: 0.14
Nodes (17): useStickyEdgeScroll(), onPointerMove(), scrollDirection(), start(), stop(), tick(), Auth, User (+9 more)

### Community 15 - "SymphonyBoard.php"
Cohesion: 0.15
Nodes (3): {closure#3}(), {closure#4}(), {closure#5}()

### Community 16 - "require-dev"
Cohesion: 0.17
Nodes (12): require-dev, fakerphp/faker, larastan/larastan, laravel/boost, laravel/pail, laravel/pao, laravel/pint, laravel/sail (+4 more)

### Community 17 - "updates"
Cohesion: 0.17
Nodes (11): default-days, patterns, github-actions, interval, updates, cooldown, directory, groups (+3 more)

### Community 18 - "composer.json"
Cohesion: 0.18
Nodes (10): autoload-dev, psr-4, description, keywords, license, minimum-stability, name, Tests\\ (+2 more)

### Community 19 - "vue"
Cohesion: 0.20
Nodes (8): vue@^3.5.13, vue, isLoading, isOpen, useLeaderboard(), open(), refresh(), *.vue

### Community 20 - "useBoardArrangement"
Cohesion: 0.29
Nodes (7): TRAY, useBoardArrangement(), place(), removeFromTray(), reset(), slotOf(), shuffle()

### Community 21 - "ImagePickerModal.vue"
Cohesion: 0.32
Nodes (7): confirm(), emit, onKeydown(), props, selected, step(), track

### Community 22 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 24 - "require"
Cohesion: 0.33
Nodes (6): require, inertiajs/inertia-laravel, laravel/framework, laravel/tinker, laravel/wayfinder, php

### Community 25 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 27 - "StoreArrangementRequest"
Cohesion: 0.15
Nodes (3): StoreAnswerRequest, StoreArrangementRequest, StorePlayerRequest

### Community 30 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 42 - "LeaderboardModal.vue"
Cohesion: 0.18
Nodes (8): filter, filters, isPlaying(), leaderboard, player, playKey(), rows, summary

### Community 43 - "bootstrap/app.php"
Cohesion: 0.28
Nodes (3): {closure#1}(), {closure#2}(), {closure#3}()

### Community 44 - "BoardSlot.vue"
Cohesion: 0.25
Nodes (7): vue-draggable-plus@^0.6.1, vue-draggable-plus, emit, list, onAdd(), props, dragOptions

### Community 45 - "lib/game.ts"
Cohesion: 0.31
Nodes (5): emit, colourKey, RESULT_PLAYER_KEY, sectionToneClasses, verdictFor()

### Community 46 - "LeaderboardButton.vue"
Cohesion: 0.31
Nodes (5): leaderboard, barClass(), props, noteHeight(), cn()

### Community 47 - "GameModal.vue"
Cohesion: 0.36
Nodes (7): activate(), deactivate(), emit, isMounted, onKeydown(), panel, props

## Knowledge Gaps
- **17 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vue` connect `vue` to `symphony.ts`, `package.json`, `Board.vue`, `types/game.ts`, `LeaderboardModal.vue`, `ResultModal.vue`, `global.d.ts`, `GameModal.vue`, `useBoardArrangement`, `ImagePickerModal.vue`?**
  _High betweenness centrality (0.045) - this node is a cross-community bridge._
- **Should `SymphonyBoard` be split into smaller, more focused modules?**
  _Cohesion score 0.057911392405063294 - nodes in this community are weakly interconnected._
- **Why does `SymphonyBoard` connect `SymphonyBoard` to `Answer`, `GameFlowTest.php`, `AppServiceProvider.php`, `SymphonyBoard.php`, `StoreArrangementRequest`?**
  _High betweenness centrality (0.043) - this node is a cross-community bridge._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.054426705370101594 - nodes in this community are weakly interconnected._
- **Why does `@inertiajs/vue3` connect `types/game.ts` to `package.json`, `vue`, `ResultModal.vue`, `Board.vue`?**
  _High betweenness centrality (0.018) - this node is a cross-community bridge._
- **Should `Answer` be split into smaller, more focused modules?**
  _Cohesion score 0.06756756756756757 - nodes in this community are weakly interconnected._
- **Should `GameFlowTest.php` be split into smaller, more focused modules?**
  _Cohesion score 0.0957983193277311 - nodes in this community are weakly interconnected._