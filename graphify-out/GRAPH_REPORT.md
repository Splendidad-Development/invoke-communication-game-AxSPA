# Graph Report - invoke-communication-game  (2026-11-26)

## Corpus Check
- 98 files · ~23,247 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 23 file(s) not represented in the graph (top: (none) 17, .example 1, .pptx 1)

## Summary
- 663 nodes · 1027 edges · 60 communities (36 shown, 24 thin omitted)
- Extraction: 97% EXTRACTED · 3% INFERRED · 0% AMBIGUOUS · INFERRED: 32 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `64b04458`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- SymphonyBoard
- ResultModal.vue
- package.json
- Answer
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
- Illuminate\Http\Request
- useBoardArrangement
- dependencies
- config
- Pest.php
- require
- psr-4
- LeaderboardModal.vue
- extra
- pnpm-workspace.yaml
- Controller
- symphony.ts
- BoardSlot.vue
- lib/game.ts
- LeaderboardButton.vue
- GameModal.vue
- Inertia\Response
- web.php
- StoreAnswerRequest
- vite.config.ts
- optionalDependencies
- ArrangementController.php
- lib/game.ts
- scripts
- DatabaseSeeder.php
- utils.ts
- SymphonyNotes.vue
- useSymphonyPlayer

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 32 edges
2. `compilerOptions` - 19 edges
3. `vue` - 16 edges
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
- `GameController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/GameController.php → app/Http/Controllers/Controller.php
- `ArrangementController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/ArrangementController.php → app/Http/Controllers/Controller.php
- `BoardController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/BoardController.php → app/Http/Controllers/Controller.php
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts

## Import Cycles
- None detected.

## Communities (60 total, 24 thin omitted)

### Community 1 - "ResultModal.vue"
Cohesion: 0.19
Nodes (11): close(), emit, hasPlayed, isPlaying, leaderboard, notes, openLeaderboard(), player (+3 more)

### Community 2 - "package.json"
Cohesion: 0.17
Nodes (14): devDependencies, @laravel/vite-plugin-wayfinder@^0.1.3, @types/node@^22.13.5, vite-plus@1.4.0, vue-tsc@^3.3.13, overrides, vite, private (+6 more)

### Community 3 - "Answer"
Cohesion: 0.06
Nodes (9): Answer, Arrangement, Player, User, AnswerFactory, ArrangementFactory, PlayerFactory, UserFactory (+1 more)

### Community 4 - "GameFlowTest.php"
Cohesion: 0.10
Nodes (25): {closure#11}(), {closure#12}(), {closure#13}(), {closure#14}(), {closure#15}(), {closure#16}(), {closure#17}(), {closure#18}() (+17 more)

### Community 5 - "Illuminate\Database\Schema\Blueprint"
Cohesion: 0.10
Nodes (11): {closure#1}(), {closure#2}(), {closure#3}(), {closure#1}(), {closure#2}(), {closure#1}(), {closure#2}(), {closure#3}() (+3 more)

### Community 6 - "Board.vue"
Cohesion: 0.06
Nodes (22): board, BoardView, edgeScroll, isLocked, isMistakesOpen, { isPhone, usesDragHandle }, isResultOpen, isSubmitting (+14 more)

### Community 7 - "types/game.ts"
Cohesion: 0.09
Nodes (21): Auth, User, ArrangementResult, BoardColumn, BoardSection, ColumnTone, GameImage, Group (+13 more)

### Community 8 - "with"
Cohesion: 0.10
Nodes (20): runs-on, steps, jobs, ci, name, on, pull_request, push (+12 more)

### Community 9 - "compilerOptions"
Cohesion: 0.10
Nodes (20): compilerOptions, allowJs, esModuleInterop, forceConsistentCasingInFileNames, isolatedModules, jsx, jsxImportSource, lib (+12 more)

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "useStickyEdgeScroll"
Cohesion: 0.67
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

### Community 19 - "Illuminate\Http\Request"
Cohesion: 0.18
Nodes (6): {closure#1}(), {closure#2}(), HandleInertiaRequests, {closure#1}(), {closure#2}(), {closure#3}()

### Community 20 - "useBoardArrangement"
Cohesion: 0.29
Nodes (7): TRAY, useBoardArrangement(), place(), removeFromTray(), reset(), slotOf(), shuffle()

### Community 21 - "dependencies"
Cohesion: 0.15
Nodes (13): dependencies, concurrently@^10.0.3, @inertiajs/vue3@^3.0.0, tailwindcss@^4.1.1, typescript@^5.2.2, vite@npm:@voidzero-dev/vite-plus-core@1.4.0, vue@^3.5.13, vue-draggable-plus@^0.6.1 (+5 more)

### Community 22 - "config"
Cohesion: 0.29
Nodes (7): pestphp/pest-plugin, php-http/discovery, config, allow-plugins, optimize-autoloader, preferred-install, sort-packages

### Community 24 - "require"
Cohesion: 0.33
Nodes (6): require, inertiajs/inertia-laravel, laravel/framework, laravel/tinker, laravel/wayfinder, php

### Community 25 - "psr-4"
Cohesion: 0.40
Nodes (5): autoload, psr-4, App\\, Database\\Factories\\, Database\\Seeders\\

### Community 27 - "LeaderboardModal.vue"
Cohesion: 0.17
Nodes (8): filter, filters, isPlaying(), leaderboard, player, playKey(), rows, summary

### Community 30 - "extra"
Cohesion: 0.67
Nodes (3): extra, laravel, dont-discover

### Community 42 - "Controller"
Cohesion: 0.23
Nodes (4): AnswerController, Controller, PlayerController, StorePlayerRequest

### Community 43 - "symphony.ts"
Cohesion: 0.27
Nodes (10): currentStep, playingKey, CHORDS, hz(), MELODY, pad(), performSymphony(), reverbImpulse() (+2 more)

### Community 44 - "BoardSlot.vue"
Cohesion: 0.16
Nodes (12): emit, { isPhone, usesDragHandle }, list, onAdd(), props, DeviceLayout, isPhone, isTouch (+4 more)

### Community 45 - "lib/game.ts"
Cohesion: 0.22
Nodes (5): vue, emit, props, slotStyle, *.vue

### Community 46 - "LeaderboardButton.vue"
Cohesion: 0.24
Nodes (6): leaderboard, isLoading, isOpen, useLeaderboard(), open(), refresh()

### Community 47 - "GameModal.vue"
Cohesion: 0.11
Nodes (21): activate(), deactivate(), emit, id, isMounted, isTopmost(), onKeydown(), openStack (+13 more)

### Community 51 - "vite.config.ts"
Cohesion: 0.22
Nodes (8): @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, @tailwindcss/vite@^4.1.11, @vitejs/plugin-vue@^6.0.0, @inertiajs/vite, laravel-vite-plugin, @tailwindcss/vite, @vitejs/plugin-vue

### Community 52 - "optionalDependencies"
Cohesion: 0.22
Nodes (9): optionalDependencies, @laravel/multiplex@^0.4.1, lightningcss-linux-x64-gnu@^1.29.1, @rollup/rollup-linux-x64-gnu@4.9.5, @tailwindcss/oxide-linux-x64-gnu@^4.0.1, @laravel/multiplex, lightningcss-linux-x64-gnu, @rollup/rollup-linux-x64-gnu (+1 more)

### Community 54 - "lib/game.ts"
Cohesion: 0.32
Nodes (6): colourKey, imageMap(), RESULT_PLAYER_KEY, sectionToneClasses, verdictFor(), imagesById

### Community 55 - "scripts"
Cohesion: 0.29
Nodes (7): scripts, build, build:ssr, check, check:fix, dev, types:check

### Community 57 - "utils.ts"
Cohesion: 0.40
Nodes (4): clsx@^2.1.1, tailwind-merge@^3.2.0, clsx, tailwind-merge

### Community 58 - "SymphonyNotes.vue"
Cohesion: 0.50
Nodes (4): barClass(), props, noteHeight(), cn()

### Community 59 - "useSymphonyPlayer"
Cohesion: 1.00
Nodes (4): useSymphonyPlayer(), play(), stop(), toggle()

## Knowledge Gaps
- **24 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `vue` connect `lib/game.ts` to `ResultModal.vue`, `package.json`, `Board.vue`, `types/game.ts`, `symphony.ts`, `BoardSlot.vue`, `index.ts`, `LeaderboardButton.vue`, `GameModal.vue`, `useBoardArrangement`, `dependencies`, `LeaderboardModal.vue`?**
  _High betweenness centrality (0.052) - this node is a cross-community bridge._
- **Should `Answer` be split into smaller, more focused modules?**
  _Cohesion score 0.05868118572292801 - nodes in this community are weakly interconnected._
- **Why does `SymphonyBoard` connect `SymphonyBoard` to `Answer`, `GameFlowTest.php`, `Controller`, `AppServiceProvider.php`, `SymphonyBoard.php`, `Inertia\Response`, `StoreAnswerRequest`, `ArrangementController.php`?**
  _High betweenness centrality (0.043) - this node is a cross-community bridge._
- **Should `GameFlowTest.php` be split into smaller, more focused modules?**
  _Cohesion score 0.09523809523809523 - nodes in this community are weakly interconnected._
- **Why does `@inertiajs/vue3` connect `index.ts` to `ResultModal.vue`, `package.json`, `Board.vue`, `LeaderboardButton.vue`, `dependencies`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **Should `Illuminate\Database\Schema\Blueprint` be split into smaller, more focused modules?**
  _Cohesion score 0.10483870967741936 - nodes in this community are weakly interconnected._
- **Should `Board.vue` be split into smaller, more focused modules?**
  _Cohesion score 0.062388591800356503 - nodes in this community are weakly interconnected._