# Graph Report - invoke-communication-game  (2026-11-27)

## Corpus Check
- 104 files · ~25,459 words
- Verdict: corpus is large enough that graph structure adds value.
- Unclassified: 24 file(s) not represented in the graph (top: (none) 18, .example 1, .pptx 1)

## Summary
- 722 nodes · 1142 edges · 58 communities (33 shown, 25 thin omitted)
- Extraction: 96% EXTRACTED · 4% INFERRED · 0% AMBIGUOUS · INFERRED: 45 edges (avg confidence: 0.85)
- Token cost: 0 input · 0 output

## Graph Freshness
- Built from commit: `b2d14af8`
- Run `git rev-parse HEAD` and compare to check if the graph is stale.
- Run `graphify update .` after code changes (no API cost).

## Community Hubs (Navigation)
- SymphonyBoard
- ResultModal.vue
- package.json
- PlayerExport.php
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
- App\Models\Answer
- symphony.ts
- BoardSlot.vue
- Illuminate\Database\Eloquent\Factories\Factory
- LeaderboardButton.vue
- GameModal.vue
- Database\Factories\ArrangementFactory
- @inertiajs/vue3
- ImagePickerModal.vue
- DatabaseSeeder.php
- lib/game.ts
- Arrangement
- SymphonyNotes.vue
- User.php

## God Nodes (most connected - your core abstractions)
1. `SymphonyBoard` - 37 edges
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
- `barClass()` --calls--> `cn()`  [EXTRACTED]
  resources/js/components/game/SymphonyNotes.vue → resources/js/lib/utils.ts
- `PlayerController` --inherits--> `Controller`  [EXTRACTED]
  app/Http/Controllers/PlayerController.php → app/Http/Controllers/Controller.php

## Import Cycles
- None detected.

## Communities (58 total, 25 thin omitted)

### Community 0 - "SymphonyBoard"
Cohesion: 0.06
Nodes (13): AnswerController, ArrangementController, BoardController, Controller, GameController, PlayerController, EnsurePlayerSession, RequireExportPassword (+5 more)

### Community 1 - "ResultModal.vue"
Cohesion: 0.19
Nodes (11): close(), emit, hasPlayed, isPlaying, leaderboard, notes, openLeaderboard(), player (+3 more)

### Community 2 - "package.json"
Cohesion: 0.06
Nodes (50): dependencies, concurrently@^10.0.3, @inertiajs/vite@^3.0.0, laravel-vite-plugin@^3.1, tailwind-merge@^3.2.0, tailwindcss@^4.1.1, @tailwindcss/vite@^4.1.11, typescript@^5.2.2 (+42 more)

### Community 3 - "PlayerExport.php"
Cohesion: 0.18
Nodes (3): {closure#1}(), {closure#2}(), {closure#3}()

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
Cohesion: 0.22
Nodes (7): vue, DeviceLayout, isPhone, isTouch, useDeviceLayout(), watchQuery(), *.vue

### Community 13 - "scripts"
Cohesion: 0.15
Nodes (13): scripts, ci:check, dev, lint, lint:check, post-autoload-dump, post-create-project-cmd, post-root-package-install (+5 more)

### Community 14 - "useStickyEdgeScroll"
Cohesion: 0.67
Nodes (6): useStickyEdgeScroll(), onPointerMove(), scrollDirection(), start(), stop(), tick()

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

### Community 42 - "App\Models\Answer"
Cohesion: 0.31
Nodes (3): Answer, Player, AnswerFactory

### Community 43 - "symphony.ts"
Cohesion: 0.23
Nodes (14): currentStep, playingKey, useSymphonyPlayer(), play(), stop(), toggle(), CHORDS, hz() (+6 more)

### Community 44 - "BoardSlot.vue"
Cohesion: 0.20
Nodes (9): vue-draggable-plus@^0.6.1, vue-draggable-plus, emit, { isPhone, usesDragHandle }, list, onAdd(), props, dragHandleOptions (+1 more)

### Community 46 - "LeaderboardButton.vue"
Cohesion: 0.24
Nodes (6): leaderboard, isLoading, isOpen, useLeaderboard(), open(), refresh()

### Community 47 - "GameModal.vue"
Cohesion: 0.23
Nodes (12): activate(), deactivate(), emit, id, isMounted, isTopmost(), onKeydown(), openStack (+4 more)

### Community 51 - "@inertiajs/vue3"
Cohesion: 0.08
Nodes (8): @inertiajs/vue3@^3.0.0, @inertiajs/vue3, answerCount, boardCount, ExportAnswer, ExportPlayer, props, answer

### Community 52 - "ImagePickerModal.vue"
Cohesion: 0.28
Nodes (8): available, confirm(), emit, onKeydown(), props, selected, step(), track

### Community 54 - "lib/game.ts"
Cohesion: 0.24
Nodes (7): emit, props, slotStyle, colourKey, RESULT_PLAYER_KEY, sectionToneClasses, verdictFor()

### Community 56 - "SymphonyNotes.vue"
Cohesion: 0.32
Nodes (6): clsx@^2.1.1, clsx, barClass(), props, noteHeight(), cn()

## Knowledge Gaps
- **25 thin communities (<3 nodes) omitted from report** — run `graphify query` to explore isolated nodes.

## Suggested Questions
_Questions this graph is uniquely positioned to answer:_

- **Why does `SymphonyBoard` connect `SymphonyBoard` to `GameFlowTest.php`, `AppServiceProvider.php`, `SymphonyBoard.php`, `Database\Factories\ArrangementFactory`, `PlayerExport`?**
  _High betweenness centrality (0.054) - this node is a cross-community bridge._
- **Should `SymphonyBoard` be split into smaller, more focused modules?**
  _Cohesion score 0.05824561403508772 - nodes in this community are weakly interconnected._
- **Why does `vue` connect `vue` to `ResultModal.vue`, `package.json`, `Board.vue`, `types/game.ts`, `symphony.ts`, `LeaderboardButton.vue`, `GameModal.vue`, `@inertiajs/vue3`, `ImagePickerModal.vue`, `useBoardArrangement`, `lib/game.ts`, `LeaderboardModal.vue`?**
  _High betweenness centrality (0.049) - this node is a cross-community bridge._
- **Should `package.json` be split into smaller, more focused modules?**
  _Cohesion score 0.05505279034690799 - nodes in this community are weakly interconnected._
- **Why does `@inertiajs/vue3` connect `@inertiajs/vue3` to `ResultModal.vue`, `package.json`, `LeaderboardButton.vue`, `Board.vue`?**
  _High betweenness centrality (0.017) - this node is a cross-community bridge._
- **Should `GameFlowTest.php` be split into smaller, more focused modules?**
  _Cohesion score 0.06826241134751773 - nodes in this community are weakly interconnected._
- **Should `Illuminate\Database\Schema\Blueprint` be split into smaller, more focused modules?**
  _Cohesion score 0.10483870967741936 - nodes in this community are weakly interconnected._