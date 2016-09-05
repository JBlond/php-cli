<?php

use \Phan\Issue;

return [

	// If true, missing properties will be created when
	// they are first seen. If false, we'll report an
	// error message.
	"allow_missing_properties" => false,

	// Allow null to be cast as any type and for any
	// type to be cast to null.
	"null_casts_as_any_type" => false,

	// If enabled, scalars (int, float, bool, string, null)
	// are treated as if they can cast to each other.
	'scalar_implicit_cast' => false,

	// If true, seemingly undeclared variables in the global
	// scope will be ignored. This is useful for projects
	// with complicated cross-file globals that you have no
	// hope of fixing.
	'ignore_undeclared_variables_in_global_scope' => false,

	// Backwards Compatibility Checking
	'backward_compatibility_checks' => true,

	// If enabled, check all methods that override a
	// parent method to make sure its signature is
	// compatible with the parent's. This check
	// can add quite a bit of time to the analysis.
	'analyze_signature_compatibility' => true,

	// Set to true in order to attempt to detect dead
	// (unreferenced) code. Keep in mind that the
	// results will only be a guess given that classes,
	// properties, constants and methods can be referenced
	// as variables (like `$class->$property` or
	// `$class->$method()`) in ways that we're unable
	// to make sense of.
	'dead_code_detection' => true,

	// Run a quick version of checks that takes less
	// time
	"quick_mode" => false,

	// Enable or disable support for generic templated
	// class types.
	'generic_types_enabled' => true,

	// By default, Phan will not analyze all node types
	// in order to save time. If this config is set to true,
	// Phan will dig deeper into the AST tree and do an
	// analysis on all nodes, possibly finding more issues.
	//
	// See \Phan\Analysis::shouldVisit for the set of skipped
	// nodes.
	'should_visit_all_nodes' => true,

	// The minimum severity level to report on. This can be
	// set to Issue::SEVERITY_LOW, Issue::SEVERITY_NORMAL or
	// Issue::SEVERITY_CRITICAL.
	'minimum_severity' => Issue::SEVERITY_LOW,

	// Add any issue types (such as 'PhanUndeclaredMethod')
	// here to inhibit them from being reported
	'suppress_issue_types' => [
		// 'PhanUndeclaredMethod',
	],

	// A file list that defines files that will be excluded
	// from parsing and analysis and will not be read at all.
	//
	// This is useful for excluding hopelessly unanalyzable
	// files that can't be removed for whatever reason.
	'exclude_file_list' => [],

	// The number of processes to fork off during the analysis
	// phase.
	'processes' => 1,

	// A list of directories that should be parsed for class and
	// method information. After excluding the directories
	// defined in exclude_analysis_directory_list, the remaining
	// files will be statically analyzed for errors.
	//
	// Thus, both first-party and third-party code being used by
	// your application should be included in this list.
	'directory_list' => [
		'./src/',
	]

];
