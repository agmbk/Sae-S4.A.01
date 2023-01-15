import {Module} from '@nestjs/common';
import {AppController} from './app.controller';
import {AppService} from './app.service';
import {TypeOrmModule} from "@nestjs/typeorm";
import {ConfigModule, ConfigService} from "@nestjs/config";
import {TeamModule} from './team/team.module';
import {join} from 'path'
import {MatchModule} from './match/match.module';

@Module({
    imports: [ConfigModule.forRoot(), TypeOrmModule.forRootAsync({
        imports: [ConfigModule],
        inject: [ConfigService],
        useFactory: (configService: ConfigService) => ({
            type: "mysql",
            host: configService.get('DATABASE_HOST'),
            port: configService.get('DATABASE_PORT'),
            username: configService.get('DATABASE_USERNAME'),
            password: configService.get('DATABASE_PASSWORD'),
            database: configService.get('DATABASE_DB'),
            entities: [join(__dirname, '**', '*.models.{ts,js}')],
            synchronize: true
        }),
    }), TeamModule, MatchModule],
    controllers: [AppController],
    providers: [AppService],
})
export class AppModule {
}
