
#
# Crawler queue
#
CREATE TABLE `tx_crawlercore_queue` (
	`id`                int(11) NOT NULL auto_increment,
	`crdate`            int(11) DEFAULT '0' NOT NULL,

	`priority`          int(11) DEFAULT '0' NOT NULL,
	`collection_id`     int(11) DEFAULT '0' NOT NULL,
	`type_id`           int(11) DEFAULT '0' NOT NULL,
	`external`          int(11) DEFAULT '0' NOT NULL,

    `process_scheduled` int(11) DEFAULT '0' NOT NULL,
    `process_id`        int(11) DEFAULT '0' NOT NULL,
    `process_completed` int(11) DEFAULT '0' NOT NULL,

    `request_data`      longtext NOT NULL,
    `result_data`       longtext NOT NULL,

    PRIMARY KEY (`id`),
    KEY idx_priority (`priority`),
    KEY idx_type_id (`type_id`),
    KEY idx_collection_id(`collection_id`),
    KEY idx_process_scheduled (`process_scheduled`),
    KEY idx_process_completed (`process_completed`),
    KEY idx_process_id (`process_id`)

);

#
# Crawler process
#
CREATE TABLE `tx_crawlercore_process` (
    `id`                        int(11) NOT NULL auto_increment,
	`crdate`                    int(11) DEFAULT '0' NOT NULL,
    `type_id`                   int(11) NOT NULL,
    `uuid`                      varchar(32) NOT NULL,
    `active`                    int(11) DEFAULT '0' NOT NULL,
    `deleted`                   int(11) DEFAULT '0' NOT NULL,
    `ttl`                       int(11) DEFAULT '0' NOT NULL,
    `maxitems`                  int(11) DEFAULT '0' NOT NULL,
    `total`                     int(11) DEFAULT '0' NOT NULL,
    `process_id`                int(11) NOT NULL,

    PRIMARY KEY (`id`),
	KEY idx_created (`crdate`),
    KEY idx_type_id (`type_id`),
    KEY idx_process_uuid (`uuid`),
    KEY idx_active (`active`),
    KEY idx_deleted (`deleted`),
    KEY idx_ttl (`ttl`),
    KEY idx_total (`total`),
    KEY idx_process_id(`process_id`)
);

#
# Crawler collection
#
CREATE TABLE `tx_crawlercore_collection` (
    `id`               int(11) NOT NULL auto_increment,
	`crdate`            int(11) DEFAULT '0' NOT NULL,
	`total`             int(11) DEFAULT '0' NOT NULL,
	`finished`          int(11) DEFAULT '0' NOT NULL,
	`description`       varchar(255) DEFAULT '' NOT NULL,

	PRIMARY KEY (`id`),
	KEY idx_created (`crdate`),
	KEY idx_total (`total`),
	KEY idx_finished (`finished`)
);