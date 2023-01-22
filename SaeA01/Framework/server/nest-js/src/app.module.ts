import {Module} from '@nestjs/common';
import {ConfigModule} from "@nestjs/config";
import {AppController} from './app.controller';
import {AppService} from './app.service';
import OrmModule from "./orm.module";
import {TeamModule} from "./team/team.module";
import {MatchModule} from "./match/match.module";

@Module({
    imports: [ConfigModule.forRoot(), OrmModule, TeamModule, MatchModule],
    controllers: [AppController],
    providers: [AppService],
})
export class AppModule {
}
