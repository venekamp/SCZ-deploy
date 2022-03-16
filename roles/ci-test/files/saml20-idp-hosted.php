<?php

/**
 * SAML 2.0 IdP configuration for SimpleSAMLphp.
 *
 * See: https://simplesamlphp.org/docs/stable/simplesamlphp-reference-idp-hosted
 */

$metadata['__DYNAMIC:1__'] = [
    /*
     * The hostname of the server (VHOST) that will use this SAML entity.
     *
     * Can be '__DEFAULT__', to use this entry by default.
     */
    'host' => '__DEFAULT__',

    'OrganizationURL' => 'https://ci-runner.sram.surf.nl/',

    'OrganizationName' => [
        'en' => 'SRAM Test IdP',
        'nl' => 'SRAM Test IdP'
    ],

    'OrganizationDisplayName' => [
        'en' => 'SRAM CI Runner Test IdP',
        'nl' => 'SRAM CI Runner Test IdP'
    ],

    'UIInfo' => [
        'DisplayName' => [
            'en' => 'SRAM CI Runner Test IdP',
            'nl' => 'SRAM CI Runner Test IdP',
        ],
        'Description' => [
            'en' => 'SRAM CI Runner Test IdP',
            'nl' => 'SRAM CI Runner Test IdP',
        ],
        'InformationURL' => [
            'en' => 'https://ci-runner.sram.surf.nl/',
            'nl' => 'https://ci-runner.sram.surf.nl/',
        ],
        'PrivacyStatementURL' => [
            'en' => 'https://ci-runner.sram.surf.nl/',
            'nl' => 'https://ci-runner.sram.surf.nl/',
        ],
        'Keywords' => [
            'en' => ['sram', 'ci', 'test'],
            'nl' => ['sram', 'ci', 'test'],
        ],
     ],

    'privatekey' => 'server.key',
    'certificate' => 'server.crt',

    'auth' => 'example-userpass',

    'attributes.NameFormat' => 'urn:oasis:names:tc:SAML:2.0:attrname-format:uri',
    'authproc' => [
        // Convert LDAP names to oids.
        100 => ['class' => 'core:AttributeMap', 'name2oid'],
    ],

];

